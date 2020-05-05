<?php

namespace App\Http\Controllers;

use App\csv;
use App\CsvData;
use App\Accs;
use App\Color;
use App\Type;
use App\PowerSupply;
use App\ScreenSize;
use App\ThunderboltPorts;
use App\Touchscreen;
use App\Exports\UsersExport;
use App\Imports\CSVImport;
use Maatwebsite\Excel\Facades\Excel;


use Complex\Exception;
use Illuminate\Http\Request;


class importController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function importExportView()
    {
        return view('Laptops.importLaptop');
    }
    public function importExportView1(){
        return view('Laptops.importAllLaptop');
    }

    public function allView()
    {
        $csvData = CsvData::all();
        return view('Laptops.viewCSV', compact('csvData'));
    }

    public function handleImportLaptop(Request $request)
    {
        $csvFullPath = null;
        if ($request->hasFile('csvfile')) {
            $file = request()->csvfile->getClientOriginalName();
            $csvFullPath = uniqid() . " " . $file;
            request()->csvfile->move(public_path('csv_data'), $csvFullPath);
        }
        //$this->importCsv($csvFullPath);
        $newCsv = new csv();
        //    return redirect('/viewall');
        $laptop = $this->importCsv($csvFullPath);
        $laptops = Accs::all();
        $colors = Color::all();
        $types = Type::all();
        $powerSupplys = PowerSupply::all();
        $screenSizes = screenSize::all();
        $thunderboltPorts = ThunderboltPorts::all();
        $touchscreens = Touchscreen::all();
        return view('Laptops.insertCsvdata', compact('laptop','laptops','colors', 'types', 'powerSupplys', 'screenSizes', 'thunderboltPorts', 'touchscreens'));
        Excel::import(new CSVImport,request()->file('select_file'));
        return back();
    }

    public function handleImportLaptop1(Request $request)
    {
        Excel::import(new CSVImport,request()->file('select_file'));
           
        return redirect()->back()->with('success','Successfully added');
    }

    public function exportCsvData($id)
    {
        CsvData::exportCsvData($id);
    }

    public function importCsv($file1)
    {
        $data = array();
        $laptop = array();
        $fileData = array();
        $hddData = "";
        $file = public_path('csv_data/' . $file1);
        $dd = "";
        $videoDesc = ""; $netDesc = "";
        $file = fopen($file, "r");
        $videoFlag = false;
        $netFlag = false;
        $hddFlag = false;

        $width = "";
        $height = "";
        $size = 0;

        while (!feof($file)) {
            $fileData = fgetcsv($file);

            //$key = substr($fileData[0], 0, -1);
            $key = $fileData[0];
            if ($key == "System Manufacturer:") {
                $data['manufacture'] = $fileData[1];
            }
            if($key == "Computer Brand Name:"){
                if(strpos($fileData[1],"HP HP") === 0){
                    $data['com_brand_name'] = substr($fileData[1], 6);  
                }else{
                    $data['com_brand_name'] = strstr($fileData[1], " ");
                }
            }
            if ($key == "Operating System:") {
                $data['os'] = $fileData[1];
            }
            if ($key == "CPU Brand Name:") {
                $data['cpu_brand_name'] = $fileData[1];
            }
            if ($key == "CPU Power Limit 1 - Long Duration:") {
                $data['cpu_power_limit'] = $fileData[1];
            }
            if ($key == "CPU Power Limit 2 - Short Duration:") {
                $data['cpu_power_limit_2'] = $fileData[1];
            }
            if ($key == "Total Memory Size:") {
                $data['total_mem_size'] = $fileData[1];
            }
            if ($key == "Memory Type:") {
                $data['mem_type'] = $fileData[1];
            }
            if ($key == "Maximum Supported Memory Clock:") {
                $data['mem_speed'] = $fileData[1];
            }
            if ($key == "Memory Channels Supported:") {
                $data['mem_channels'] = $fileData[1];
            }
            if ($key == "Designed Capacity:") {
                $data['battery_cap'] = $fileData[1];
            }
            if($key == "Max. Vertical Size:"){
                $height = $fileData[1];
            }
            if($key == "Max. Horizontal Size:"){
                $width = $fileData[1];
            }
            if($key == "Drives")
            {
                $hddFlag = true;
            }
            if($key == "Audio")
            {
                $hddFlag = false;
            }

            if($hddFlag && is_array($fileData))
            {
                if(sizeof($fileData) > 1 && ($key == "Drive Capacity:" || $key == "Drive Model:") )
                {
                    if($key == "Drive Model:") {
                        $hddData .= $fileData[1] . " : ";
                    }
                    else{
                        $hddData .= $fileData[1] . "\n";
                    }
                }
            }
            if ($key == "Product Serial Number:") {
                $data['com_serial_number'] = $fileData[1];
            }

            if($key == "Video Adapter") {
                $videoFlag = true;
            }

            if($key == "Monitor")
                $videoFlag = false;

            if($videoFlag)
            {
                if(sizeof($fileData) > 1 && $key === "Driver Description:")
                    $videoDesc .= $fileData[1]."\n";
            }

            if($key == "Network") {
                $netFlag = true;
            }

            if($key == "Ports")
                $netFlag = false;

            if($netFlag)
            {
                if(sizeof($fileData) > 1 && $key === "Driver Description:")
                    $netDesc .= $fileData[1]."\n";
            }

        }
        fclose($file);
        $width = substr($width, 0, -3);
        $width = (int)$width * 0.393701;
        $height = substr($height, 0, -3);
        $height = (int)$height * 0.393701;
        $size = ((pow($height,2)) + (pow($width,2)));
        $size = sqrt($size);
        $size = round($size, 1);
        $data['screen_size'] = $size;
        $data['videocard'] = $videoDesc;
        $data['network'] = $netDesc;
        $data['drive_capacity'] = $hddData;
        //$customerArr = $this->csvToArray($file);
        return $data;

        //CsvData::insert($data);
    }

    function csvToArray($fileData)
    {
        if (count($fileData)) {
            echo "<pre>";
            print_r($fileData);
            echo "</pre>";
        }
    }
 
    public function exportCsv($id)
    {
        $delimiter = ",";
        
    
        //create a file pointer
        $f = fopen('php://memory', 'w');
        $fields=[
            'id',
            'Manufacture',
            'Model',
            'Colour',
            'Type',
            'Battery capacity',
            'Power supply',
            'Power supply details',
            'OS',
            'CPU brand name',
            'CPU power limit 1',
            'CPU power limit 2',
            'Memory size',
            'Type',
            'Speed',
            'Channels',
            'Screen size',
            'Resolution',
            'Panel tech',
            'Touchscreen',
            'Drive capacity',
            'Serial number',
            'Video card',
            'Network',
            'Thunderbolt ports',
            'Accessories',
            'Owner',
            'Location',
            'Comments',
			'Created at',
            'Updated at',
        ];
        //set column headers
        fputcsv($f, $fields, $delimiter);
        $laptop = CsvData::getByid($id);
        //output each row of the data, format line as csv and write to file pointer
        $filename = $laptop['manufacture'] ."_". $laptop['com_brand_name'] ."_".  $laptop['com_serial_number']. ".csv";

        $lineData = array($laptop['id'],$laptop['manufacture'],$laptop['com_brand_name'],$laptop['colour'],$laptop['type'],$laptop['battery_cap'],$laptop['power_supply'],$laptop['power_supply_details'],$laptop['os'],$laptop['cpu_brand_name'],$laptop['cpu_power_limit'],$laptop['cpu_power_limit_2'],$laptop['total_mem_size'],$laptop['mem_type'],$laptop['mem_speed'],$laptop['mem_channels'],$laptop['screen_size'],$laptop['touchscreen_type'],$laptop['drive_capacity'],$laptop['com_serial_number'],$laptop['videocard'],$laptop['network'],$laptop['thunderbolt_ports'],$laptop['accessories'],$laptop['owner'],$laptop['location'],$laptop['comments'],$laptop['created_at'],$laptop['updated_at']);
        fputcsv($f, $lineData, $delimiter);
        //move back to beginning of file
        fseek($f, 0);
        
        //set headers to download file rather than displayed
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        
        //output all remaining data on a file pointer
        fpassthru($f);
}

    public function editCsv($id)
    {
        $laptops = Accs::all();
        $laptop = CsvData::getByid($id);
        $colors = Color::all();
        $types = Type::all();
        $powerSupplys = PowerSupply::all();
        $screenSizes = screenSize::all();
        $thunderboltPorts = ThunderboltPorts::all();
        $touchscreens = Touchscreen::all();

        return view('Laptops.editCsvdata', compact('laptop','laptops','colors', 'types', 'powerSupplys', 'screenSizes', 'thunderboltPorts', 'touchscreens'));
    }

    public function destroy($id)
    {
        $laptop = CsvData::find($id);
        $laptop->delete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateImportData(Request $request, $id)
    {
        logger("update call");
        $request->validate([
            'manufacture' => 'required',
            'com_brand_name' => 'required',
            'colour' => 'required',
            'type' => 'required',
            'battery_cap' => 'required',
            'power_supply' => 'required',
            'power_supply_details' => 'required',
            'os' => 'required',
            'cpu_brand_name' => 'required',
            'cpu_power_limit' => 'required',
            'cpu_power_limit_2' => 'required',
            'total_mem_size' => 'required',
            'mem_type' => 'required',
            'mem_speed' => 'required',
            'mem_channels' => 'required',
            'screen_size' => 'required',
            'screen_rez' => 'required',
            'screen_tech' => 'required',
            'touchscreen_type' => 'required',
            'drive_capacity' => 'required',
            'com_serial_number' => 'required | unique:csv_data,com_serial_number,'.$id.',id',
            'videocard' => 'required',
            'network' => 'required',
            'thunderbolt_ports' => 'required',
            'accessories' => 'required',
            'owner' => 'required',
            'comments' => 'required',
            'location' => 'required',

        ]);
        CsvData::updateCsvdata($request, $id);
        return redirect()->route('viewall')->with('success', 'Laptop updated successfully');
    }

    public function insertImportData(Request $request)
    {

        logger("update call");
        CsvData::insertCsvdata($request);
        return redirect()->route('viewall')->with('success', 'Laptop imported successfully');
    }


    public function check_serial_number(Request $request)
    {

        $serialNumberCheck = CsvData::where('com_serial_number', $request->com_serial_number)->first();
        if(!is_null($serialNumberCheck)){
            echo "error";
        }else{
            echo "success";
       }
    }


}
