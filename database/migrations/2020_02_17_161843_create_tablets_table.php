<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('brand');
            $table->text('model');
            $table->text('color');
            $table->text('cpu_vendor');
            $table->text('cpu_model');
            $table->text('ram');
            $table->text('storage');
            $table->text('screen_size');
            $table->text('power_supply');
            $table->text('power_supply_details');
            $table->text('accessories');
            $table->text('sn');
            $table->text('owner');
            $table->text('location');
            $table->text('comments');
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
        Schema::dropIfExists('tablets');
    }
}
