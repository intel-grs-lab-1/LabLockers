@extends('layouts/app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit CsvData
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <form method="POST" name="updateCsvData" action="{{ url('import/updatedata', $laptop->id) }}">
        @csrf
        <form method="POST" name="updateCsvData" action="{{ url('import/insertdata') }}">
        @csrf
        <div class="form-group">
          <label for="name">Manufacture</label>
          <input type="text" class="form-control" name="manufacturer" value= "{{@$laptop['manufacturer'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Model</label>
          <input type="text" class="form-control" name="com_brand_name" value= "{{@$laptop['com_brand_name'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Colour</label>
          <textarea type="text" class="form-control" name="colour">{{@$laptop['colour'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Type</label>
          <textarea type="text" class="form-control" name="type">{{@$laptop['type'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Battery capacity</label>
          <textarea type="text" class="form-control" name="battery_cap">{{@$laptop['battery_cap'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Power supply</label>
          <textarea type="text" class="form-control" name="power_supply">{{@$laptop['power_supply_details'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">power supply details</label>
          <textarea type="text" class="form-control" name="power_supply_details">{{@$laptop['colour'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Operating System</label>
          <textarea type="text" class="form-control" name="os">{{@$laptop['os'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">CPU Brand Name</label>
          <textarea type="text" class="form-control" name="cpu_brand_name">{{@$laptop['cpu_brand_name'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">CPU Power Limit 1</label>
          <input type="text" class="form-control" name="cpu_power_limit" value="{{@$laptop['cpu_power_limit'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">CPU Power Limit 2</label>
          <input type="text" class="form-control" name="cpu_power_limit_2" value="{{@$laptop['cpu_power_limit_2'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Total Memory Size</label>
          <input type="text" class="form-control" name="total_mem_size" value="{{@$laptop['total_mem_size'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Memory type</label>
          <textarea rows="4" type="text" class="form-control" name="mem_type">{{@$laptop['mem_type'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">memory speed</label>
          <textarea rows="4" type="text" class="form-control" name="mem_speed">{{@$laptop['mem_speed'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Memory channel</label>
          <textarea rows="4" type="text" class="form-control" name="mem_channels">{{@$laptop['mem_channels'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">screen size</label>
          <textarea rows="4" type="text" class="form-control" name="screen_size">{{@$laptop['screen_size'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">resolution</label>
          <textarea rows="4" type="text" class="form-control" name="screen_rez">{{@$laptop['screen_rez'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Screen Technology</label>
          <textarea rows="4" type="text" class="form-control" name="screen_tech">{{@$laptop['screen_tech'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Touchscreen type</label>
          <textarea rows="4" type="text" class="form-control" name="touchscreen_type">{{@$laptop['touchscreen_type'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Dive Capacity</label>
          <textarea type="text" class="form-control" name="drive_capacity">{{@$laptop['drive_capacity'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Serial Number</label>
          <input type="text" class="form-control" name="com_serial_number" value="{{@$laptop['com_serial_number'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Video Card</label>
          <textarea rows="4" type="text" class="form-control" name="videocard">{{@$laptop['videocard'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Network</label>
          <textarea rows="4" type="text" class="form-control" name="network">{{@$laptop['network'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">No. thunderbolt ports</label>
          <textarea rows="4" type="text" class="form-control" name="thunderbolt_ports">{{@$laptop['thunderbolt_ports'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">accessories</label>
          <textarea rows="4" type="text" class="form-control" name="accessories">{{@$laptop['accessories'] }}</textarea>
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
        <!-- Update button -->
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection