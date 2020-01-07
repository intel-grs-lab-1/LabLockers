<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use db;
use Response;

class CsvData extends Model
{
    protected $fillable = ['com_brand_name' , 'os', 'cpu_brand_name', 'cpu_power_limit', 'total_mem_size', 'drive_capacity', 'com_serial_number','drive_des','videocard','network'];

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
            $data = array();
            $cd['com_brand_name'] = $request->com_brand_name;
            $cd['colour'] = $request->colour;
            $cd['power_supply'] = $request->power_supply;
            $cd['os'] = $request->os;
            $cd['cpu_brand_name'] = $request->cpu_brand_name;
            $cd['cpu_power_limit'] = $request->cpu_power_limit;
            $cd['total_mem_size'] = $request->total_mem_size;
            $cd['drive_capacity'] = $request->drive_capacity;
            $cd['com_serial_number'] = $request->com_serial_number;
            $cd['drive_des'] = $request->drive_des;
            $cd['videocard'] = $request->videocard;
            $cd['network'] = $request->network;
            $cd['comments'] = $request->comments;
            $cd['location'] = $request->location;

            CsvData::where('id', $id)->update($data);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }

    }

    public static function insertCsvdata($request)
    {
        $cd = new CsvData();
        try {

            $cd['com_brand_name'] = $request->com_brand_name;
            $cd['colour'] = $request->colour;
            $cd['power_supply'] = $request->power_supply;
            $cd['os'] = $request->os;
            $cd['cpu_brand_name'] = $request->cpu_brand_name;
            $cd['cpu_power_limit'] = $request->cpu_power_limit;
            $cd['total_mem_size'] = $request->total_mem_size;
            $cd['drive_capacity'] = $request->drive_capacity;
            $cd['com_serial_number'] = $request->com_serial_number;
            $cd['drive_des'] = $request->drive_des;
            $cd['videocard'] = $request->videocard;
            $cd['network'] = $request->network;
            $cd['comments'] = $request->comments;
            $cd['location'] = $request->location;
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
