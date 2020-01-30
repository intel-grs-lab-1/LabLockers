<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use db;
use Response;

class CsvData extends Model
{

    protected $fillable = ['manufacturer','com_brand_name' , 'colour','type','battery_cap', 'power_supply','power_supply_details', 'os', 'cpu_brand_name',  'cpu_power_limit','cpu_power_limit_2', 'total_mem_size','mem_type','mem_speed','mem_channels','screen_size','screen_rez','screen_tech','touchscreen_type', 'drive_capacity', 'com_serial_number','videocard','network','thunderbolt_ports','accessories','owner','location', 'comments'];

    public static function getByid($id)
    {
        $data = CsvData::where('id',$id)->first();
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
            $cd['manufacture'] = $request->manufacture;
            $cd['com_brand_name'] = $request->com_brand_name;
            $cd['colour'] = $request->colour;
            $cd['type'] = $request->type;
            $cd['battery_cap'] = $request->battery_cap;
            $cd['power_supply'] = $request->power_supply;
            $cd['power_supply_details'] = $request->power_supply_details;
            $cd['os'] = $request->os;
            $cd['cpu_brand_name'] = $request->cpu_brand_name;
            $cd['cpu_power_limit'] = $request->cpu_power_limit;
            $cd['cpu_power_limit_2'] = $request->cpu_power_limit_2;
            $cd['total_mem_size'] = $request->total_mem_size;
            $cd['mem_type'] = $request->mem_type;
            $cd['mem_speed'] = $request->mem_speed;
            $cd['mem_channels'] = $request->mem_channels;
            $cd['screen_size'] = $request->screen_size;
            $cd['screen_rez'] = $request->screen_rez;
            $cd['screen_tech'] = $request->screen_tech;
            $cd['drive_capacity'] = $request->drive_capacity;
            $cd['com_serial_number'] = $request->com_serial_number;
            $cd['videocard'] = $request->videocard;
            $cd['network'] = $request->network;
            $cd['touchscreen_type'] = $request->touchscreen_type;
            $cd['thunderbolt_ports'] = $request->thunderbolt_ports;
            $cd['accessories'] = $request->accessories;
            $cd['owner'] = $request->owner;
            $cd['location'] = $request->location;
            $cd['comments'] = $request->comments;
            CsvData::where('id',$id)->update($cd);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

    }

    public static function insertCsvdata($request)
    {
        $cd = new CsvData();
        try {

            $cd['manufacture'] = $request->manufacture;
            $cd['com_brand_name'] = $request->com_brand_name;
            $cd['colour'] = $request->colour;
            $cd['type'] = $request->type;
            $cd['battery_cap'] = $request->battery_cap;
            $cd['power_supply'] = $request->power_supply;
            $cd['power_supply_details'] = $request->power_supply_details;
            $cd['os'] = $request->os;
            $cd['cpu_brand_name'] = $request->cpu_brand_name;
            $cd['cpu_power_limit'] = $request->cpu_power_limit;
            $cd['cpu_power_limit_2'] = $request->cpu_power_limit_2;
            $cd['total_mem_size'] = $request->total_mem_size;
            $cd['mem_type'] = $request->mem_type;
            $cd['mem_speed'] = $request->mem_speed;
            $cd['mem_channels'] = $request->mem_channels;
            $cd['screen_size'] = $request->screen_size;
            $cd['screen_rez'] = $request->screen_rez;
            $cd['screen_tech'] = $request->screen_tech;
            $cd['drive_capacity'] = $request->drive_capacity;
            $cd['com_serial_number'] = $request->com_serial_number;
            $cd['videocard'] = $request->videocard;
            $cd['network'] = $request->network;
            $cd['touchscreen_type'] = $request->touchscreen_type;
            $cd['thunderbolt_ports'] = $request->thunderbolt_ports;
            $cd['accessories'] = $request->accessories;
            $cd['owner'] = $request->owner;
            $cd['location'] = $request->location;
            $cd['comments'] = $request->comments;
            $cd->save();
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

    }

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
