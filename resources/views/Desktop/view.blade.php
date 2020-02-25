@extends('layouts.app')

@section('content')

@if (Session::has('message'))

<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered" id="laptop_table" width="100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID #</th>
            <th scope="col">Manufacturer</th>
            <th scope="col">Computer Brand Name</th>
            <th scope="col">Colour</th>
            <th scope="col">Type</th>
            <th scope="col">Battery Capicity</th>
            <th scope="col">Power supply</th>
            <th scope="col">Power supply details</th>
            <th scope="col">Operating System</th>
            <th scope="col">CPU Brand Name</th>
            <th scope="col">CPU Power Limit 1 Long Duration</th>
            <th scope="col">CPU Power Limit 2 Short Duration</th>
            <th scope="col">Total Memory Size</th>
            <th scope="col">Type</th>
            <th scope="col">Speed</th>
            <th scope="col">channels</th>
            <th scope="col">Screen Size</th>
            <th scope="col">Resolution</th>
            <th scope="col">Panel Technology</th>
            <th scope="col">Touchscreen</th>
            <th scope="col">Drive Capacity</th>
            <th scope="col">Serial Number</th>
            <th scope="col">Video Card</th>
            <th scope="col">Network</th>
            <th scope="col">ThunderBolt ports</th>
            <th scope="col">Accessories</th>
            <th scope="col">Owner</th>
            <th scope="col">location</th>
            <th scope="col">Comments</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($desktop))
        @foreach($desktop as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td>{{$product->manufacture}}</td>
            <td>{{$product->com_brand_name}}</td>
            <td>{{$product->colour}}</td>
            <td>{{$product->type}}</td>
            <td>{{$product->battery_cap}}</td>
            <td>{{$product->power_supply}}</td>
            <td>{{$product->power_supply_details}}</td>
            <td>{{$product->os}}</td>
            <td>{{$product->cpu_brand_name}}</td>
            <td>{{$product->cpu_power_limit}}</td>
            <td>{{$product->cpu_power_limit_2}}</td>
            <td>{{$product->total_mem_size}}</td>
            <td>{{$product->mem_type}}</td>
            <td>{{$product->mem_speed}}</td>
            <td>{{$product->mem_channels}}</td>
            <td>{{$product->screen_size}}</td>
            <td>{{$product->screen_rez}}</td>
            <td>{{$product->screen_tech}}</td>
            <td>{{$product->touchscreen_type}}</td>
            <td>{{$product->drive_capacity}}</td>
            <td>{{$product->com_serial_number}}</td>
            <td>{{$product->videocard}}</td>
            <td>{{$product->network}}</td>
            <td>{{$product->thunderbolt_ports}}</td>
            <td>{{$product->accessories}}</td>
            <td>{{$product->owner}}</td>
            <td>{{$product->location}}</td>
            <td>{{$product->comments}}</td>
            <td><a href="{{ url('import/edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ url('import/destroy', $product->id)}}" method="post">
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
