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
            $table->string('com_brand_name')->nullable();
            $table->text('colour')->nullable();
            $table->text('power_supply')->nullable();
            $table->string('os')->nullable();
            $table->string('cpu_brand_name')->nullable();
            $table->string('cpu_power_limit')->nullable();
            $table->string('total_mem_size')->nullable();
            $table->string('drive_capacity')->nullable();
            $table->string('com_serial_number')->nullable();
            $table->text('videocard')->nullable();
            $table->text('network')->nullable();
            $table->text('comments')->nullable();
            $table->string('location')->nullable();
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
