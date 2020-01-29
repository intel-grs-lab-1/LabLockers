<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvDataTable extends Migration
{

    public function up()
    {
        Schema::create('csv_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            //device
            $table->text('manufacturer')->nullable();
            $table->string('com_brand_name')->nullable();
            $table->text('colour')->nullable();
            //covertaible / 2 in 1 / clam ...
            $table->text('type')->nullable();
            //Battery + Power Supply
            $table->text('battery_cap')->nullable();
            $table->text('power_supply')->nullable();
            $table->text('power_supply_details')->nullable();
            //OS
            $table->string('os')->nullable();
            //CPU
            $table->string('cpu_brand_name')->nullable();
            $table->string('cpu_power_limit')->nullable();
            $table->string('cpu_power_limit_2')->nullable();
            //RAM
            $table->string('total_mem_size')->nullable();
            $table->text('mem_type')->nullable();
            $table->text('mem_speed')->nullable();
            $table->text('mem_channels')->nullable();
            //screen
            $table->text('screen_size')->nullable();
            $table->text('screen_rez')->nullable();
            $table->text('screen_tech')->nullable();
            $table->text('touchscreen_type')->nullable();
            //Storage
            $table->string('drive_capacity')->nullable();
            //system
            $table->string('com_serial_number')->nullable();
            $table->text('videocard')->nullable();
            $table->text('network')->nullable();

            $table->text('thunderbolt_ports')->nullable();
            $table->text('accessories')->nullable();
            $table->text('owner')->nullable();

            $table->string('location')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csv_data');
    }
}
