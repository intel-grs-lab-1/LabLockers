<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesktopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desktops', function (Blueprint $table) {
            $table->bigIncrements('id');
            //system
            $table->text('System_Manufacturer')->nullable();
            $table->text('Product_Name')->nullable();
            $table->text('Product_Version')->nullable();
            $table->text('Product_Serial_Number')->nullable();
            $table->text('UUID')->nullable();
            $table->text('SKU_Number')->nullable();
            $table->text('Family')->nullable();
            //Mainboard
            $table->text('Mainboard_Manufacturer')->nullable();
            $table->text('Mainboard_Name')->nullable();
            $table->text('Mainboard_Version')->nullable();
            $table->text('Mainboard_Serial_Number')->nullable();
            $table->text('Asset_Tag')->nullable();
            $table->text('Location_in_chassis')->nullable();
            //OS
            $table->text('OS')->nullable();
            //CPU
            $table->text('CPU_Brand_Name')->nullable();
            $table->text('CPU_QDF')->nullable();
            $table->text('CPU_Thermal_Design_Power_TDP')->nullable();
            $table->text('CPU_Power_Limit_4')->nullable();
            //Motherboard
            $table->text('Motherboard_Model')->nullable();
            $table->text('Motherboard_Chipset')->nullable();
            $table->text('Motherboard_Slots')->nullable();
            $table->text('BIOS_Date')->nullable();
            $table->text('BIOS_Version')->nullable();
            $table->text('UEFI_BIOS')->nullable();
            //Memory
            $table->text('Total_Memory_Size')->nullable();
            $table->text('Memory_Type')->nullable();
            $table->text('Module_Type')->nullable();
            $table->text('Memory_Speed')->nullable();
            $table->text('Current_Timing')->nullable();
            $table->text('Memory_Channels_Active')->nullable();
            //Network
            $table->text('Network_Card')->nullable();
            //Video
            $table->text('Video_Chipset')->nullable();
            $table->text('Video_Chipset_Codename')->nullable();
            $table->text('Video_Card')->nullable();
            $table->text('Video_Memory')->nullable();
            $table->text('Memory_Clock')->nullable();
            $table->text('Memory_Bus_Width')->nullable();
            $table->text('Processor_Clock')->nullable();
            $table->text('Video_Unit_Clock')->nullable();
            $table->text('Number_Of_ROPs')->nullable();
            $table->text('Number_Of_Unified_Shaders')->nullable();
            $table->text('Number_Of_TMUs')->nullable();
            $table->text('ASIC_Serial_Number')->nullable();
            //Drivers
            $table->text('Host_Controller')->nullable();
            $table->text('Drive_Model')->nullable();
            $table->text('NVMe_Version_Supported')->nullable();
            $table->text('Drive_Capacity')->nullable();
            //others
            $table->text('power_supply_details')->nullable(); 
            $table->text('accessories')->nullable();
            $table->text('owner')->nullable();
            //location
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
        Schema::dropIfExists('desktops');
    }
}
