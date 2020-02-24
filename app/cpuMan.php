<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cpuMan extends Model
{
	protected $table = 'cpu_man';
    protected $fillable = [
        'name', 
    ];
}
