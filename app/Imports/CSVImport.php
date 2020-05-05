<?php
   
namespace App\Imports;
   
use App\CsvData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class CSVImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if(empty($row['manufacture']))
        {
            $row['manufacture']=NULL;
        }
        if(empty($row['model']))
        {
            $row['model']=NULL;
        }
        if(empty($row['colour']))
        {
            $row['colour']=NULL;
        }
        if(empty($row['battery_capacity']))
        {
            $row['battery_capacity']=NULL;
        }
        if(empty($row['power_supply']))
        {
            $row['power_supply']=NULL;
        }
        if(empty($row['power_supply_details']))
        {
            $row['power_supply_details']=NULL;
        }
        if(empty($row['os']))
        {
            $row['os']=NULL;
        }
        if(empty($row['cpu_brand_name']))
        {
            $row['cpu_brand_name']=NULL;
        }
        if(empty($row['cpu_power_limit_1']))
        {
            $row['cpu_power_limit_1']=NULL;
        }
        if(empty($row['cpu_power_limit_2']))
        {
            $row['cpu_power_limit_2']=NULL;
        }
        if(empty($row['memory_size']))
        {
            $row['memory_size']=NULL;
        }
        if(empty($row['type']))
        {
            $row['type']=NULL;
        }
        if(empty($row['speed']))
        {
            $row['speed']=NULL;
        }
        if(empty($row['channels']))
        {
            $row['channels']=NULL;
        }
        if(empty($row['screen_size']))
        {
            $row['screen_size']=NULL;
        }
        if(empty($row['resolution']))
        {
            $row['resolution']=NULL;
        }
        if(empty($row['panel_tech']))
        {
            $row['panel_tech']=NULL;
        }
        if(empty($row['touchscreen']))
        {
            $row['touchscreen']=NULL;
        }
        if(empty($row['drive_capacity']))
        {
            $row['drive_capacity']=NULL;
        }
        if(empty($row['serial_number']))
        {
            $row['serial_number']=NULL;
        }
        if(empty($row['video_card']))
        {
            $row['video_card']=NULL;
        }
        if(empty($row['network']))
        {
            $row['network']=NULL;
        }
        if(empty($row['thunderbolt_ports']))
        {
            $row['thunderbolt_ports']=NULL;
        }
        if(empty($row['accessories']))
        {
            $row['accessories']=NULL;
        }
        if(empty($row['owner']))
        {
            $row['owner']=NULL;
        }
        if(empty($row['location']))
        {
            $row['location']=NULL;
        }
        if(empty($row['comments']))
        {
            $row['comments']=NULL;
        }


        
        return new CsvData([
                    'id'=>$row['id'],
                    'manufacture'  => $row['manufacture'],
                    'com_brand_name'  =>$row['model'],
                    'colour'  =>$row['colour'],
                    'battery_cap'  =>$row['battery_capacity'],
                    'power_supply'  =>$row['power_supply'],
                    'power_supply_details'  =>$row['power_supply_details'],
                    'os'  =>$row['os'],
                    'cpu_brand_name'  =>$row['cpu_brand_name'],
                    'cpu_power_limit'  =>$row['cpu_power_limit_1'],
                    'cpu_power_limit_2'  =>$row['cpu_power_limit_2'],
                    'total_mem_size'  =>$row['memory_size'],
                    'mem_type'  =>$row['type'],
                    'mem_speed'  =>$row['speed'],
                    'mem_channels'  =>$row['channels'],
                    'screen_size'  =>$row['screen_size'],
                    'screen_rez'  =>$row['resolution'],
                    'screen_tech'  =>$row['panel_tech'],
                    'touchscreen_type'  =>$row['touchscreen'],
                    'drive_capacity'  =>$row['drive_capacity'],
                    'com_serial_number'  =>$row['serial_number'],
                    'videocard'  =>$row['video_card'],
                    'network'  =>$row['network'],
                    'thunderbolt_ports'  =>$row['thunderbolt_ports'],
                    'accessories'  =>$row['accessories'],
                    'owner'  =>$row['owner'],
                    'location'  =>$row['location'],
                    'comments'  =>$row['comments'] 
                ]);
    }


}