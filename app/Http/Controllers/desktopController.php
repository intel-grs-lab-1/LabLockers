<?php

namespace App\Http\Controllers;

use App\csv;
use App\desktop;
use App\Accs;


use Complex\Exception;
use Illuminate\Http\Request;

class desktopController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function importExportView()
	{
		return view('Desktop.importDesktop');
	}

	public function allView()
	{
		$csvData = desktop::all();
		return view('Desktop.view', compact('csvData'));
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
		return view('Desktop.insertDesktop', compact('laptop', 'laptops'));
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
		$file = public_path('csv_data/' . $file1);
		//video
		$videoDesc = "";
		$videoChipName = "";
		$videoCard = "";
		$videoMemory = "";
		$memoryClock = "";
		$memoryBusWidth = "";
		$processorClock = "";
		$videoUnitClock = "";
		$rops = "";
		$shaders = "";
		$tmu = "";
		$serialnumbers = "";
		//network 
		$netDesc = "";
		//drives
		$hddData = "";
		$driveModel = "";
		$nvme = "";
		$capacity = "";
		$file = fopen($file, "r");

		//flags
		$systemFlag = false;
		$mainboardFlag = false;
		$cpuFlag = false;
		$motherboardFlag = false;
		$memeoryFlag = false;
		$videoFlag = false;
		$netFlag = false;
		$hddFlag = false;

		while (!feof($file)) {
			$fileData = fgetcsv($file);

			//$key = substr($fileData[0], 0, -1);
			$key = $fileData[0];
			
			//system flags
			if ($key == "System") {
				$systemFlag = true;
			}
			if($key == "Mainboard"){
				$systemFlag = false;
			}
			//mainboard        
			if($key == "Mainboard"){
				$mainboardFlag = true;
			}
			if($key == "System Enclosure"){
				$mainboardFlag = false;
			}
			//cpu
			if($key == "Central Processor(s)"){
				$cpuFlag = true;
			}
			if($key == "Motherboard"){
				$cpuFlag = false;
			}
			//Motherboard
			if($key == "Motherboard"){
				$motherboardFlag = true;
			}
			if($key == "ACPI Devices"){
				$motherboardFlag = false;
			} 
			// drives           
			if($key == "Drives")
			{
				$hddFlag = true;
			}
			if($key == "Audio")
			{
				$hddFlag = false;
			}
			//GPU
			if($key == "Video Adapter") {
				$videoFlag = true;
			}

			if($key == "Monitor"){
				$videoFlag = false;
			}
			//network
			if($key == "Network") {
				$netFlag = true;
			}

			if($key == "Ports"){
				$netFlag = false;
			}

			if($systemFlag){
				if(sizeof($fileData) > 1 && $key === "System Manufacturer:"){
					if($fileData[1] === ""){
						$data['System_Manufacturer'] = "N/A";
					}else{
						$data['System_Manufacturer'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Product Name:"){
					$data['Product_Name'] = $fileData[1];
				}
				if(sizeof($fileData) > 1 && $key === "Product Version:"){
					if($fileData[1] === ""){
						$data['Product_Version'] = "N/A";
					}else{
						$data['Product_Version'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Product Serial Number:"){
					$data['Product_Serial_Number'] = $fileData[1];
				}
				if(sizeof($fileData) > 1 && $key === "UUID:"){
					$data['UUID'] = $fileData[1];
				}
				if(sizeof($fileData) > 1 && $key === "SKU Number:"){
					$data['SKU_Number'] = $fileData[1];
				}
				if(sizeof($fileData) > 1 && $key === "Family:"){
					$data['Family'] = $fileData[1];
				}
			}
			if($mainboardFlag){
				if(sizeof($fileData) > 1 && $key === "Mainboard Manufacturer:"){
					if($fileData[1] === ""){
						$data['Mainboard_Manufacturer'] = "N/A";
					}else{
						$data['Mainboard_Manufacturer'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Mainboard Name:"){
					if($fileData[1] === ""){
						$data['Mainboard_Name'] = "N/A";
					}else{
						$data['Mainboard_Name'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Mainboard Version:"){
					if($fileData[1] === ""){
						$data['Mainboard_Version'] = "N/A";
					}else{
						$data['Mainboard_Version'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Mainboard Serial Number:"){
					if($fileData[1] === ""){
						$data['Mainboard_Serial_Number'] = "N/A";
					}else{
						$data['Mainboard_Serial_Number'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Asset Tag:"){
					if($fileData[1] === ""){
						$data['Asset_Tag'] = "N/A";
					}else{
						$data['Asset_Tag'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Location in chassis:"){
					if($fileData[1] === ""){
						$data['Location_in_chassis'] = "N/A";
					}else{
						$data['Location_in_chassis'] = $fileData[1];
					}
				}
			}
			if ($key == "Operating System:") {
				$data['OS'] = $fileData[1];
			}
			if($cpuFlag){
				if(sizeof($fileData) > 1 && $key === "CPU Brand Name:"){
					if($fileData[1] === ""){
						$data['CPU_Brand_Name'] = "N/A";
					}else{
						$data['CPU_Brand_Name'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "CPU QDF:"){
					if($fileData[1] === ""){
						$data['CPU_QDF'] = "N/A";
					}else{
						$data['CPU_QDF'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "CPU Thermal Design Power (TDP):"){
					if($fileData[1] === ""){
						$data['CPU_Thermal_Design_Power_TDP'] = "N/A";
					}else{
						$data['CPU_Thermal_Design_Power_TDP'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "CPU Power Limit 4 (PL4):"){
					if($fileData[1] === ""){
						$data['CPU_Power_Limit_4'] = "N/A";
					}else{
						$data['CPU_Power_Limit_4'] = $fileData[1];
					}
				}
			}
			if($motherboardFlag){
				if(sizeof($fileData) > 1 && $key === "Motherboard Model:"){
					if($fileData[1] === ""){
						$data['Motherboard_Model'] = "N/A";
					}else{
						$data['Motherboard_Model'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Motherboard Chipset:"){
					if($fileData[1] === ""){
						$data['Motherboard_Chipset'] = "N/A";
					}else{
						$data['Motherboard_Chipset'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Motherboard Slots:"){
					if($fileData[1] === ""){
						$data['Motherboard_Slots'] = "N/A";
					}else{
						$data['Motherboard_Slots'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "BIOS Date:"){
					if($fileData[1] === ""){
						$data['BIOS_Date'] = "N/A";
					}else{
						$data['BIOS_Date'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "BIOS Version:"){
					if($fileData[1] === ""){
						$data['BIOS_Version'] = "N/A";
					}else{
						$data['BIOS_Version'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "UEFI BIOS:"){
					if($fileData[1] === ""){
						$data['UEFI_BIOS'] = "N/A";
					}else{
						$data['UEFI_BIOS'] = $fileData[1];
					}
				}
			}
			if($memeoryFlag){
				if(sizeof($fileData) > 1 && $key === "Total Memory Size:"){
					if($fileData[1] === ""){
						$data['Total_Memory_Size'] = "N/A";
					}else{
						$data['Total_Memory_Size'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Memory Type:"){
					if($fileData[1] === ""){
						$data['Memory_Type'] = "N/A";
					}else{
						$data['Memory_Type'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Module Type:"){
					if($fileData[1] === ""){
						$data['Module_Type'] = "N/A";
					}else{
						$data['Module_Type'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Memory Speed:"){
					if($fileData[1] === ""){
						$data['Memory_Speed'] = "N/A";
					}else{
						$data['Memory_Speed'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Current Timing (tCAS-tRCD-tRP-tRAS):"){
					if($fileData[1] === ""){
						$data['Current_Timing'] = "N/A";
					}else{
						$data['Current_Timing'] = $fileData[1];
					}
				}
				if(sizeof($fileData) > 1 && $key === "Memory Channels Active:"){
					if($fileData[1] === ""){
						$data['Memory_Channels_Active'] = "N/A";
					}else{
						$data['Memory_Channels_Active'] = $fileData[1];
					}
				}
			}
			if($netFlag)
			{
				if(sizeof($fileData) > 1 && $key === "Network Card:"){
					$netDesc .= $fileData[1]."    ";
				}
			}
			if($videoFlag)
			{
				if(sizeof($fileData) > 1 && $key === "Video Chipset:"){
					$videoDesc .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Video Chipset Codename:"){
					$videoChipName .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Video Card:"){
					$videoCard .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Video Memory:"){
					$videoMemory .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Memory Clock:"){
					$memoryClock .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Memory Bus Width:"){
					$memoryBusWidth .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Processor Clock:"){
					$processorClock .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Video Unit Clock:"){
					$videoUnitClock .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Number Of ROPs:"){
					$rops .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Number Of Unified Shaders:"){
					$shaders .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Number Of TMUs (Texture Mapping Units):"){
					$tmu .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "ASIC Serial Number:"){
					$serialnumbers .= $fileData[1]."    ";
				}

			}
			if($hddFlag && is_array($fileData))
			{
				if(sizeof($fileData) > 1 && $key === "Host Controller:"){
					$hddData .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Drive Model:"){
					$driveModel .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "NVMe Version Supported:"){
					$nvme .= $fileData[1]."    ";
				}
				if(sizeof($fileData) > 1 && $key === "Drive Capacity:"){
					$capacity .= $fileData[1]."    ";
				}
			}
		}
		fclose($file);
		//video
		$data['Video_Chipset'] = $videoDesc;
		$data['Video_Chipset_Codename'] =  $videoChipName;
		$data['Video_Card'] =  $videoCard;
		$data['Video_Memory'] =  $videoMemory;
		$data['Memory_Clock'] =  $memoryClock;
		$data['Memory_Bus_Width'] =  $memoryBusWidth;
		$data['Processor_Clock'] =  $processorClock;
		$data['Video_Unit_Clock'] =  $videoUnitClock;
		$data['Number_Of_ROPs'] =  $rops;
		$data['Number_Of_Unified_Shaders'] =  $shaders;
		$data['Number_Of_TMUs'] =  $tmu;
		$data['ASIC_Serial_Number'] =  $serialnumbers;
		//network
		$data['Network_Card'] = $netDesc;
		//drives
		$data['Host_Controller'] = $hddData;
		$data['Drive_Model'] = $driveModel;
		$data['NVMe_Version_Supported'] = $nvme;
		$data['Drive_Capacity'] = $capacity;
		return $data;

		//CsvData::insert($data);
	}


	public function editCsv($id)
	{
		$laptops = Accs::all();
		$laptop = desktop::getByid($id);

		return view('Desktop.edit', compact('laptop','laptops'));
	}

	public function destroy($id)
	{
		$laptop = desktop::find($id);
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
			'System_Manufacturer' => 'required',
			'Product_Name' => 'required',
			'Product_Version' => 'required',
			'Product_Serial_Number' => 'required',
			'UUID' => 'required',
			'SKU_Number' => 'required',
			'Family' => 'required',
			//Mainboard
			'Mainboard_Manufacturer' => 'required',
			'Mainboard_Name' => 'required',
			'Mainboard_Version' => 'required',
			'Mainboard_Serial_Number' => 'required',
			'Asset_Tag' => 'required',
			'Location_in_chassis' => 'required',
			//OS
			'OS' => 'required',
			//CPU
			'CPU_Brand_Name' => 'required',
			'CPU_QDF' => 'required',
			'CPU_Thermal_Design_Power_TDP' => 'required',
			'CPU_Power_Limit_4' => 'required',
			//Motherboard
			'Motherboard_Model' => 'required',
			'Motherboard_Chipset' => 'required',
			'Motherboard_Slots' => 'required',
			'BIOS_Date' => 'required',
			'BIOS_Version' => 'required',
			'UEFI_BIOS' => 'required',
			//Memory
			'Total_Memory_Size' => 'required',
			'Memory_Type' => 'required',
			'Module_Type' => 'required',
			'Memory_Speed' => 'required',
			'Current_Timing' => 'required',
			'Memory_Channels_Active' => 'required',
			//Network
			'Network_Card' => 'required',
			//Video
			'Video_Chipset' => 'required',
			'Video_Chipset_Codename' => 'required',
			'Video_Card' => 'required',
			'Video_Memory' => 'required',
			'Memory_Clock' => 'required',
			'Memory_Bus_Width' => 'required',
			'Processor_Clock' => 'required',
			'Video_Unit_Clock' => 'required',
			'Number_Of_ROPs' => 'required',
			'Number_Of_Unified_Shaders' => 'required',
			'Number_Of_TMUs' => 'required',
			'ASIC_Serial_Number' => 'required',
			//Drivers
			'Host_Controller' => 'required',
			'Drive_Model' => 'required',
			'NVMe_Version_Supported' => 'required',
			'Drive_Capacity' => 'required',
			//other
			'power_supply_details' => 'required',
			'accessories' => 'required',
			'owner' => 'required',
			'location' => 'required',
			'comments' => 'required',

		]);
		desktop::updateCsvdata($request, $id);
		return redirect()->route('viewallDesktop')->with('success', 'Desktop updated successfully');
	}

	public function insertImportData(Request $request)
	{
		logger("update call");

		 $cd = new desktop();
            $cd->System_Manufacturer = $request->get('System_Manufacturer');
            $cd->Product_Name = $request->get('Product_Name');
            $cd->Product_Version = $request->get('Product_Version');
            $cd->Product_Serial_Number = $request->get('Product_Serial_Number');
            $cd->UUID = $request->get('UUID');
            $cd->SKU_Number = $request->get('SKU_Number');
            $cd->Family = $request->get('Family');
            $cd->Mainboard_Manufacturer = $request->get('Mainboard_Manufacturer');
            $cd->Mainboard_Name = $request->get('Mainboard_Name');
            $cd->Mainboard_Version = $request->get('Mainboard_Version');
            $cd->Mainboard_Serial_Number = $request->get('Mainboard_Serial_Number');
            $cd->Asset_Tag = $request->get('Asset_Tag');
            $cd->Location_in_chassis = $request->get('Location_in_chassis');
            $cd->OS = $request->get('OS');
            $cd->CPU_Brand_Name = $request->get('CPU_Brand_Name');
            $cd->CPU_QDF = $request->get('CPU_QDF');
            $cd->CPU_Thermal_Design_Power_TDP = $request->get('CPU_Thermal_Design_Power_TDP');
            $cd->CPU_Power_Limit_4 = $request->get('CPU_Power_Limit_4');
            $cd->Motherboard_Model = $request->get('Motherboard_Model');
            $cd->Motherboard_Chipset = $request->get('Motherboard_Chipset');
            $cd->Motherboard_Slots = $request->get('Motherboard_Slots');
            $cd->BIOS_Date = $request->get('BIOS_Date');
            $cd->BIOS_Version = $request->get('BIOS_Version');
            $cd->UEFI_BIOS = $request->get('UEFI_BIOS');
            $cd->Total_Memory_Size = $request->get('Total_Memory_Size');
            $cd->Memory_Type = $request->get('Memory_Type');
            $cd->Module_Type = $request->get('Module_Type');
            $cd->Memory_Speed = $request->get('Memory_Speed');
            $cd->Current_Timing = $request->get('Current_Timing');
            $cd->Memory_Channels_Active = $request->get('Memory_Channels_Active');
            $cd->Network_Card = $request->get('Network_Card');
            $cd->Video_Chipset = $request->get('Video_Chipset');
            $cd->Video_Chipset_Codename = $request->get('Video_Chipset_Codename');
            $cd->Video_Card = $request->get('Video_Card');
            $cd->Video_Memory = $request->get('Video_Memory');
            $cd->Memory_Clock = $request->get('Memory_Clock');
            $cd->Memory_Bus_Width = $request->get('Memory_Bus_Width');
            $cd->Processor_Clock = $request->get('Processor_Clock');
            $cd->Video_Unit_Clock = $request->get('Video_Unit_Clock');
            $cd->Number_Of_ROPs = $request->get('Number_Of_ROPs');
            $cd->Number_Of_Unified_Shaders = $request->get('Number_Of_Unified_Shaders');
            $cd->Number_Of_TMUs = $request->get('Number_Of_TMUs');
            $cd->ASIC_Serial_Number = $request->get('ASIC_Serial_Number');
            $cd->Host_Controller = $request->get('Host_Controller');
            $cd->Drive_Model = $request->get('Drive_Model');
            $cd->NVMe_Version_Supported = $request->get('NVMe_Version_Supported');
            $cd->Drive_Capacity = $request->get('Drive_Capacity');
            $cd->power_supply_details = $request->get('power_supply_details');
            $cd->accessories = $request->get('accessories');
            $cd->owner = $request->get('owner');
            $cd->location = $request->get('location');
            $cd->comments = $request->get('comments');
            $cd->save();
		//desktop::insertCsvdata($request);
		return redirect()->route('viewallDesktop')->with('success', 'Desktop updated successfully');
	}

}
