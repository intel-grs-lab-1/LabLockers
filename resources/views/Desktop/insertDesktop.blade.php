@extends('layouts/app')

@section('content')
<div class="card uper">
	<div class="card-header">
		<h3>Insert Desktop</h3> 


	</div>
	<div class="card-body" style="text-transform: capitalize;">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			@include('layouts.message')
		</div><br />
		@endif
		<form method="POST" name="updateCsvData" action="{{ url('/desktop/import/insertdata') }}">
			@csrf
			<div class="form-group">
				<label for="name">System_Manufacturer</label>
				<input type="text" class="form-control"  required="" name="System_Manufacturer" value= "{{@$laptop['System_Manufacturer'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Product_Name</label>
				<input type="text" class="form-control"  required="" name="Product_Name" value= "{{@$laptop['Product_Name'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Product_Version</label>
				<input type="text" class="form-control"  required="" name="Product_Version" value= "{{@$laptop['Product_Version'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Product_Serial_Number</label>
				<input type="text" class="form-control"  required="" name="Product_Serial_Number" value= "{{@$laptop['Product_Serial_Number'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">UUID</label>
				<input type="text" class="form-control"  required="" name="UUID" value= "{{@$laptop['UUID'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">SKU_Number</label>
				<input type="text" class="form-control"  required="" name="SKU_Number" value= "{{@$laptop['SKU_Number'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Family</label>
				<input type="text" class="form-control"  required="" name="Family" value= "{{@$laptop['Family'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Mainboard_Manufacturer</label>
				<input type="text" class="form-control"  required="" name="Mainboard_Manufacturer" value= "{{@$laptop['Mainboard_Manufacturer'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Mainboard_Name</label>
				<input type="text" class="form-control"  required="" name="Mainboard_Name" value= "{{@$laptop['Mainboard_Name'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Mainboard_Version</label>
				<input type="text" class="form-control"  required="" name="Mainboard_Version" value= "{{@$laptop['Mainboard_Version'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Mainboard_Serial_Number</label>
				<input type="text" class="form-control"  required="" name="Mainboard_Serial_Number" value= "{{@$laptop['Mainboard_Serial_Number'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Asset_Tag</label>
				<input type="text" class="form-control"  required="" name="Asset_Tag" value= "{{@$laptop['Asset_Tag'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Location_in_chassis</label>
				<input type="text" class="form-control"  required="" name="Location_in_chassis" value= "{{@$laptop['Location_in_chassis'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">OS</label>
				<input type="text" class="form-control"  required="" name="OS" value= "{{@$laptop['OS'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">CPU_Brand_Name</label>
				<input type="text" class="form-control"  required="" name="CPU_Brand_Name" value= "{{@$laptop['CPU_Brand_Name'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">CPU_QDF</label>
				<input type="text" class="form-control"  required="" name="CPU_QDF" value= "{{@$laptop['CPU_QDF'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">CPU_Thermal_Design_Power_TDP</label>
				<input type="text" class="form-control"  required="" name="CPU_Thermal_Design_Power_TDP" value= "{{@$laptop['CPU_Thermal_Design_Power_TDP'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">CPU_Power_Limit_4</label>
				<input type="text" class="form-control"  required="" name="CPU_Power_Limit_4" value= "{{@$laptop['CPU_Power_Limit_4'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Motherboard_Model</label>
				<input type="text" class="form-control"  required="" name="Motherboard_Model" value= "{{@$laptop['Motherboard_Model'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Motherboard_Chipset</label>
				<input type="text" class="form-control"  required="" name="Motherboard_Chipset" value= "{{@$laptop['Motherboard_Chipset'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Motherboard_Slots</label>
				<input type="text" class="form-control"  required="" name="Motherboard_Slots" value= "{{@$laptop['Motherboard_Slots'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">BIOS_Date</label>
				<input type="text" class="form-control"  required="" name="BIOS_Date" value= "{{@$laptop['BIOS_Date'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">BIOS_Version</label>
				<input type="text" class="form-control"  required="" name="BIOS_Version" value= "{{@$laptop['BIOS_Version'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">UEFI_BIOS</label>
				<input type="text" class="form-control"  required="" name="UEFI_BIOS" value= "{{@$laptop['UEFI_BIOS'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Total_Memory_Size</label>
				<input type="text" class="form-control"  required="" name="Total_Memory_Size" value= "{{@$laptop['Total_Memory_Size'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Memory_Type</label>
				<input type="text" class="form-control"  required="" name="Memory_Type" value= "{{@$laptop['Memory_Type'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Module_Type</label>
				<input type="text" class="form-control"  required="" name="Module_Type" value= "{{@$laptop['Module_Type'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Memory_Speed</label>
				<input type="text" class="form-control"  required="" name="Memory_Speed" value= "{{@$laptop['Memory_Speed'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Current_Timing</label>
				<input type="text" class="form-control"  required="" name="Current_Timing" value= "{{@$laptop['Current_Timing'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Memory_Channels_Active</label>
				<input type="text" class="form-control"  required="" name="Memory_Channels_Active" value= "{{@$laptop['Memory_Channels_Active'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Network_Card</label>
				<input type="text" class="form-control"  required="" name="Network_Card" value= "{{@$laptop['Network_Card'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Video_Chipset</label>
				<input type="text" class="form-control"  required="" name="Video_Chipset" value= "{{@$laptop['Video_Chipset'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Video_Chipset_Codename</label>
				<input type="text" class="form-control"  required="" name="Video_Chipset_Codename" value= "{{@$laptop['Video_Chipset_Codename'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Video_Card</label>
				<input type="text" class="form-control"  required="" name="Video_Card" value= "{{@$laptop['Video_Card'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Video_Memory</label>
				<input type="text" class="form-control"  required="" name="Video_Memory" value= "{{@$laptop['Video_Memory'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Memory_Clock</label>
				<input type="text" class="form-control"  required="" name="Memory_Clock" value= "{{@$laptop['Memory_Clock'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Memory_Bus_Width</label>
				<input type="text" class="form-control"  required="" name="Memory_Bus_Width" value= "{{@$laptop['Memory_Bus_Width'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Processor_Clock</label>
				<input type="text" class="form-control"  required="" name="Processor_Clock" value= "{{@$laptop['Processor_Clock'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Video_Unit_Clock</label>
				<input type="text" class="form-control"  required="" name="Video_Unit_Clock" value= "{{@$laptop['Video_Unit_Clock'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Number_Of_ROPs</label>
				<input type="text" class="form-control"  required="" name="Number_Of_ROPs" value= "{{@$laptop['Number_Of_ROPs'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Number_Of_Unified_Shaders</label>
				<input type="text" class="form-control"  required="" name="Number_Of_Unified_Shaders" value= "{{@$laptop['Number_Of_Unified_Shaders'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Number_Of_TMUs</label>
				<input type="text" class="form-control"  required="" name="Number_Of_TMUs" value= "{{@$laptop['Number_Of_TMUs'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">ASIC_Serial_Number</label>
				<input type="text" class="form-control"  required="" name="ASIC_Serial_Number" value= "{{@$laptop['ASIC_Serial_Number'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Host_Controller</label>
				<input type="text" class="form-control"  required="" name="Host_Controller" value= "{{@$laptop['Host_Controller'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Drive_Model</label>
				<input type="text" class="form-control"  required="" name="Drive_Model" value= "{{@$laptop['Drive_Model'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">NVMe_Version_Supported</label>
				<input type="text" class="form-control"  required="" name="NVMe_Version_Supported" value= "{{@$laptop['NVMe_Version_Supported'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">Drive_Capacity</label>
				<input type="text" class="form-control"  required="" name="Drive_Capacity" value= "{{@$laptop['Drive_Capacity'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">power_supply_details</label>
				<input type="text" class="form-control"  required="" name="power_supply_details" value= "{{@$laptop['power_supply_details'] }}"/>
			</div>
			<div class="form-group">
				<label for="name">accessories</label>
				<div class="row">
					<div class="col-md-12">
						<select class="js-example-basic-multiple col-md-12" name="accessories" multiple="multiple">
							<option class="disabled">Choose Workfile</option>
							@foreach($laptops as $acc)
							<option value="{{$acc->name}}">{{$acc->name}}</option>
							@endforeach
						</select>
					</div>
				</div>   

			</div>
			<div class="form-group">
				<label for="name">owner</label>
				<textarea rows="4" type="text" class="form-control" name="owner">{{@$laptop['owner'] }}</textarea>
			</div>
			<div class="form-group">
				<label for="name">Location</label>
				<textarea type="text" class="form-control" name="location">{{@$laptop['location'] }}</textarea>
			</div>
			<div class="form-group">
				<label for="name">Comments</label>
				<textarea type="text" class="form-control" name="comments">{{@$laptop['comments'] }}</textarea>
			</div>
			<!-- Insert button -->
			<button type="submit" class="btn btn-primary">Insert</button>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
</script>
@endsection