<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use db;
use Response;

class desktop extends Model
{
   protected  $table = 'desktops';
    protected $fillable = [
            //system
            'System_Manufacturer',
            'Product_Name',
            'Product_Version',
            'Product_Serial_Number',
            'UUID',
            'SKU_Number',
            'Family',
            //Mainboard
            'Mainboard_Manufacturer',
            'Mainboard_Name',
            'Mainboard_Version',
            'Mainboard_Serial_Number',
            'Asset_Tag',
            'Location_in_chassis',
            //OS
            'OS',
            //CPU
            'CPU_Brand_Name',
            'CPU_QDF',
            'CPU_Thermal_Design_Power_TDP',
            'CPU_Power_Limit_4',
            //Motherboard
            'Motherboard_Model',
            'Motherboard_Chipset',
            'Motherboard_Slots',
            'BIOS_Date',
            'BIOS_Version',
            'UEFI_BIOS',
            //Memory
            'Total_Memory_Size',
            'Memory_Type',
            'Module_Type',
            'Memory_Speed',
            'Current_Timing',
            'Memory_Channels_Active',
            //Network
            'Network_Card',
            //Video
            'Video_Chipset',
            'Video_Chipse_Codename',
            'Video_Card',
            'Video_Memory',
            'Memory_Clock',
            'Memory_Bus_Width',
            'Processor_Clock',
            'Video_Unit_Clock',
            'Number_Of_ROPs',
            'Number_Of_Unified_Shaders',
            'Number_Of_TMUs',
            'ASIC_Serial_Number',
            //Drivers
            'Host_Controller',
            'Drive_Model',
            'NVMe_Version_Supported',
            'Drive_Capacity',
            //other
            'power_supply_details',
            'accessories',
            'owner',
            'location',
            'comments',


    ];

    public static function getByid($id)
    {
        $data = desktop::where('id',$id)->first();
        if($data)
        {
            return $data;
        }
        return '';
    }

    public static function updateCsvdata($request,$id)
    {
        try {
            $cd = array();
            $cd['System_Manufacturer'] = $request->System_Manufacturer;
            $cd['Product_Name'] = $request->Product_Name;
            $cd['Product_Version'] = $request->Product_Version;
            $cd['Product_Serial_Number'] = $request->Product_Serial_Number;
            $cd['UUID'] = $request->UUID;
            $cd['SKU_Number'] = $request->SKU_Number;
            $cd['Family'] = $request->Family;
            $cd['Mainboard_Manufacturer'] = $request->Mainboard_Manufacturer;
            $cd['Mainboard_Name'] = $request->Mainboard_Name;
            $cd['Mainboard_Version'] = $request->Mainboard_Version;
            $cd['Mainboard_Serial_Number'] = $request->Mainboard_Serial_Number;
            $cd['Asset_Tag'] = $request->Asset_Tag;
            $cd['Location_in_chassis'] = $request->Location_in_chassis;
            $cd['OS'] = $request->OS;
            $cd['CPU_Brand_Name'] = $request->CPU_Brand_Name;
            $cd['CPU_QDF'] = $request->CPU_QDF;
            $cd['CPU_Thermal_Design_Power_TDP'] = $request->CPU_Thermal_Design_Power_TDP;
            $cd['CPU_Power_Limit_4'] = $request->CPU_Power_Limit_4;
            $cd['Motherboard_Model'] = $request->Motherboard_Model;
            $cd['Motherboard_Chipset'] = $request->Motherboard_Chipset;
            $cd['Motherboard_Slots'] = $request->Motherboard_Slots;
            $cd['BIOS_Date'] = $request->BIOS_Date;
            $cd['BIOS_Version'] = $request->BIOS_Version;
            $cd['UEFI_BIOS'] = $request->UEFI_BIOS;
            $cd['Total_Memory_Size'] = $request->Total_Memory_Size;
            $cd['Memory_Type'] = $request->Memory_Type;
            $cd['Module_Type'] = $request->Module_Type;
            $cd['Memory_Speed'] = $request->Memory_Speed;
            $cd['Current_Timing'] = $request->Current_Timing;
            $cd['Memory_Channels_Active'] = $request->Memory_Channels_Active;
            $cd['Network_Card'] = $request->Network_Card;
            $cd['Video_Chipset'] = $request->Video_Chipset;
            $cd['Video_Chipset_Codename'] = $request->Video_Chipset_Codename;
            $cd['Video_Card'] = $request->Video_Card;
            $cd['Video_Memory'] = $request->Video_Memory;
            $cd['Memory_Clock'] = $request->Memory_Clock;
            $cd['Memory_Bus_Width'] = $request->Memory_Bus_Width;
            $cd['Processor_Clock'] = $request->Processor_Clock;
            $cd['Video_Unit_Clock'] = $request->Video_Unit_Clock;
            $cd['Number_Of_ROPs'] = $request->Number_Of_ROPs;
            $cd['Number_Of_Unified_Shaders'] = $request->Number_Of_Unified_Shaders;
            $cd['Number_Of_TMUs'] = $request->Number_Of_TMUs;
            $cd['ASIC_Serial_Number'] = $request->ASIC_Serial_Number;
            $cd['Host_Controller'] = $request->Host_Controller;
            $cd['Drive_Model'] = $request->Drive_Model;
            $cd['NVMe_Version_Supported'] = $request->NVMe_Version_Supported;
            $cd['Drive_Capacity'] = $request->Drive_Capacity;
            $cd['power_supply_details'] = $request->power_supply_details;
            $cd['accessories'] = $request->accessories;
            $cd['owner'] = $request->owner;
            $cd['location'] = $request->location;
            $cd['comments'] = $request->comments;
            desktop::where('id',$id)->update($cd);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

    }

    /*public static function insertCsvdata($request)
    {
        
        try {
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
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

    }*/
    public static function getCsv($columnNames, $rows, $fileName = 'file.csv') {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $fileName,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $callback = function() use ($columnNames, $rows ) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columnNames);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public static function exportCsvData($id) {

        $rows = [['a','b','c'],[1,2,3]];//replace this with your own array of arrays
        $columnNames = ['blah', 'yada', 'hmm'];//replace this with your own array of string column headers
        return self::getCsv($columnNames, $rows);
    }
}
