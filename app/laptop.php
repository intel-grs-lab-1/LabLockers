<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
	protected $fillable = [
    'Brand',
    'Model',
    'Screen_Size',
    'CPU',
    'GPU',
    'RAM',
    'HDD',
    'SSD',
    'OS',
    'Power_Supply',
    'Serial_Number',
    'Comments',
    'Location'
  ];

    public static function saveData($data)
    {
        print_r($data);
//        for ($i = 0; $i < count($data); $i ++)
//        {
//            laptop::firstOrCreate($data[$i]);
//        }
    }
}
