<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
    	protected $fillable = [
    		'brand',
    		'model',
            'color',
    		'cpu_vendor',
    		'cpu_model',
    		'ram',
    		'storage',
    		'screen_size',
    		'power_supply',
    		'power_supply_details',
    		'accessories',
    		'sn',
    		'owner',
    		'location',
    		'comments',
    	];
}
