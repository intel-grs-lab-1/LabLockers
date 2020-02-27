@extends('layouts.app')

@section('content')

<h1>Desktop</h1>

@if (Session::has('message'))

<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered" id="laptop_table" width="100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID #</th>
            <th scope="col">System_Manufacturer</th>
            <th scope="col">Product_Name</th>
            <th scope="col">Product_Version</th>
            <th scope="col">Product_Serial_Number</th>
            <th scope="col">UUID</th>
            <th scope="col">SKU_Number</th>
            <th scope="col">Family</th>
            <th scope="col">Mainboard_Manufacturer</th>
            <th scope="col">Mainboard_Name</th>
            <th scope="col">Mainboard_Version</th>
            <th scope="col">Mainboard_Serial_Number</th>
            <th scope="col">Asset_Tag</th>
            <th scope="col">Location_in_chassis</th>
            <th scope="col">OS</th>
            <th scope="col">CPU_Brand_Name</th>
            <th scope="col">CPU_QDF</th>
            <th scope="col">CPU_Thermal_Design_Power_TDP</th>
            <th scope="col">CPU_Power_Limit_4</th>
            <th scope="col">Computer_Brand_Name</th>
            <th scope="col">Motherboard_Model</th>
            <th scope="col">Motherboard_Chipset</th>
            <th scope="col">Motherboard_Slots</th>
            <th scope="col">BIOS_Date</th>
            <th scope="col">BIOS_Version</th>
            <th scope="col">UEFI_BIOS</th>
            <th scope="col">Total_Memory_Size</th>
            <th scope="col">Memory_Type</th>
            <th scope="col">Module_Type</th>
            <th scope="col">Memory_Speed</th>
            <th scope="col">Current_Timing</th>
            <th scope="col">Memory_Channels_Active</th>
            <th scope="col">Network_Card</th>
            <th scope="col">Video_Chipset</th>
            <th scope="col">Video_Chipset_Codename</th>
            <th scope="col">Video_Card</th>
            <th scope="col">Video_Memory</th>
            <th scope="col">Memory_Clock</th>
            <th scope="col">Memory_Bus_Width</th>
            <th scope="col">Processor_Clock</th>
            <th scope="col">Video_Unit_Clock</th>
            <th scope="col">Number_Of_ROPs</th>
            <th scope="col">Number_Of_Unified_Shaders</th>
            <th scope="col">Number_Of_TMUs</th>
            <th scope="col">ASIC_Serial_Number</th>
            <th scope="col">Host_Controller</th>
            <th scope="col">Drive_Model</th>
            <th scope="col">NVMe_Version_Supported</th>
            <th scope="col">Drive_Capacity</th>
            <th scope="col">power_supply_details</th>
            <th scope="col">accessories</th>
            <th scope="col">owner</th>
            <th scope="col">location</th>
            <th scope="col">comments</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($csvData))
        @foreach($csvData as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->System_Manufacturer}}</th>
            <td>{{$product->Product_Name}}</th>
            <td>{{$product->Product_Version}}</th>
            <td>{{$product->Product_Serial_Number}}</th>
            <td>{{$product->UUID}}</th>
            <td>{{$product->SKU_Number}}</th>
            <td>{{$product->Family}}</th>
            <td>{{$product->Mainboard_Manufacturer}}</th>
            <td>{{$product->Mainboard_Name}}</th>
            <td>{{$product->Mainboard_Version}}</th>
            <td>{{$product->Mainboard_Serial_Number}}</th>
            <td>{{$product->Asset_Tag}}</th>
            <td>{{$product->Location_in_chassis}}</th>
            <td>{{$product->OS}}</th>
            <td>{{$product->CPU_Brand_Name}}</th>
            <td>{{$product->CPU_QDF}}</th>
            <td>{{$product->CPU_Thermal_Design_Power_TDP}}</th>
            <td>{{$product->CPU_Power_Limit_4}}</th>
            <td>{{$product->Computer_Brand_Name}}</th>
            <td>{{$product->Motherboard_Model}}</th>
            <td>{{$product->Motherboard_Chipset}}</th>
            <td>{{$product->Motherboard_Slots}}</th>
            <td>{{$product->BIOS_Date}}</th>
            <td>{{$product->BIOS_Version}}</th>
            <td>{{$product->UEFI_BIOS}}</th>
            <td>{{$product->Total_Memory_Size}}</th>
            <td>{{$product->Memory_Type}}</th>
            <td>{{$product->Module_Type}}</th>
            <td>{{$product->Memory_Speed}}</th>
            <td>{{$product->Current_Timing}}</th>
            <td>{{$product->Memory_Channels_Active}}</th>
            <td>{{$product->Network_Card}}</th>
            <td>{{$product->Video_Chipset}}</th>
            <td>{{$product->Video_Chipset_Codename}}</th>
            <td>{{$product->Video_Card}}</th>
            <td>{{$product->Video_Memory}}</th>
            <td>{{$product->Memory_Clock}}</th>
            <td>{{$product->Memory_Bus_Width}}</th>
            <td>{{$product->Processor_Clock}}</th>
            <td>{{$product->Video_Unit_Clock}}</th>
            <td>{{$product->Number_Of_ROPs}}</th>
            <td>{{$product->Number_Of_Unified_Shaders}}</th>
            <td>{{$product->Number_Of_TMUs}}</th>
            <td>{{$product->ASIC_Serial_Number}}</th>
            <td>{{$product->Host_Controller}}</th>
            <td>{{$product->Drive_Model}}</th>
            <td>{{$product->NVMe_Version_Supported}}</th>
            <td>{{$product->Drive_Capacity}}</th>
            <td>{{$product->power_supply_details}}</th>
            <td>{{$product->accessories}}</td>
            <td>{{$product->owner}}</td>
            <td>{{$product->location}}</td>
            <td>{{$product->comments}}</td>
            <td><a href="{{ url('/desktop/import/edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ url('/desktop/import/destroy', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<br>
<a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
<br>
<script type="text/javascript">
    $(document).ready( function () {
        $('#laptop_table').DataTable();
    });
</script>

@endsection
