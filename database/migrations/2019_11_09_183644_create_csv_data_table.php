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
            $table->text('manufacturer')->nullable(); //from csv
            $table->string('com_brand_name')->nullable(); // from csv
            $table->text('colour')->nullable(); // from drop down
            //covertaible / 2 in 1 / clam ...
            $table->text('type')->nullable(); // from drop down
            //Battery + Power Supply
            $table->text('battery_cap')->nullable(); //from csv
            $table->text('power_supply')->nullable(); // drop down
            $table->text('power_supply_details')->nullable(); // manual
            //OS
            $table->string('os')->nullable();// frrom csv
            //CPU
            $table->string('cpu_brand_name')->nullable(); // from csv
            $table->string('cpu_power_limit')->nullable(); // from csv
            $table->string('cpu_power_limit_2')->nullable(); // from csv
            //RAM
            $table->string('total_mem_size')->nullable(); //from csv
            $table->text('mem_type')->nullable(); //from csv
            $table->text('mem_speed')->nullable(); //from csv
            $table->text('mem_channels')->nullable(); //from csv
            //screen
            $table->text('screen_size')->nullable(); //from dropdown
            $table->text('screen_rez')->nullable(); // manual
            $table->text('screen_tech')->nullable(); //from drop down
            $table->text('touchscreen_type')->nullable(); // from drop down
            //Storage
            $table->string('drive_capacity')->nullable(); // from csv
            //system
            $table->string('com_serial_number')->nullable(); //from csv
            $table->text('videocard')->nullable(); //from csv
            $table->text('network')->nullable(); //from csv
            // others
            $table->text('thunderbolt_ports')->nullable(); //from drop down
            $table->text('accessories')->nullable();//from drop down
            $table->text('owner')->nullable();// manual
            //location
            $table->string('location')->nullable(); // manual
            $table->text('comments')->nullable(); // manual
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
