<?php

namespace App\Http\Controllers;

use App\csv;
use App\CsvData;
use App\laptop;
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

 
        return view('Laptops.insertCsvdata', compact('laptop'));
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

        while (!feof($file)) {
            $fileData = fgetcsv($file);

            //$key = substr($fileData[0], 0, -1);
            $key = $fileData[0];
            if ($key == "Computer Brand Name:") {
                $data['com_brand_name'] = $fileData[1];
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
            if ($key == "Total Memory Size:") {
                $data['total_mem_size'] = $fileData[1];
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
                if(sizeof($fileData) > 1)
                    $videoDesc .=$key. " : ".$fileData[1]."\n";
                else
                    $videoDesc .=$key."\n";
            }

            if($key == "Network") {
                $netFlag = true;
            }

            if($key == "Ports")
                $netFlag = false;

            if($netFlag)
            {
                if(sizeof($fileData) > 1)
                    $netDesc .=$key. " : ".$fileData[1]."\n";
                else
                    $netDesc .=$key."\n";
            }

        }
        fclose($file);
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

    public function editCsv($id)
    {
        $laptop = CsvData::getByid($id);

        return view('Laptops.editCsvdata', compact('laptop'));
    }

    public function destroy($id)
    {
        $laptop = laptop::find($id);
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
            'com_brand_name' => 'required',
            'colour' => 'required',
            'power_supply' => 'required',
            'os' => 'required',
            'cpu_brand_name' => 'required',
            'cpu_power_limit' => 'required',
            'total_mem_size' => 'required',
            'drive_capacity' => 'required',
            'com_serial_number' => 'required',
            'videocard' => 'required',
            'network' => 'required',
            'comments' => 'required',
            'location' => 'required',

        ]);
        CsvData::updateCsvdata($request, $id);
        return redirect()->route('viewall')->with('success', 'Laptop updated successfully');
    }

    public function insertImportData(Request $request)
    {
        logger("update call");
            // $request->validate([
            //     'com_brand_name' => 'required',
            //     'colour' => 'required',
            //     'power_supply' => 'required',
            //     'os' => 'required',
            //     'cpu_brand_name' => 'required',
            //     'cpu_power_limit' => 'required',
            //     'total_mem_size' => 'required',
            //     'drive_capacity' => 'required',
            //     'com_serial_number' => 'required',
            //     'drive_des' => 'required',
            //     'videocard' => 'required',
            //     'network' => 'required',
            //     'comments' => 'required',
            //     'location' => 'required',
            // ]);
        CsvData::insertCsvdata($request);
        return redirect()->route('viewall')->with('success', 'Laptop updated successfully');
    }
}
