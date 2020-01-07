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
          <label for="name">Computer Brand Name</label>
          <input type="text" class="form-control" name="com_brand_name" value= "{{$laptop['com_brand_name'] }}"/>
        </div>
        <div class="form-group">
          <label for="name">Colour</label>
          <textarea type="text" class="form-control" name="os">{{$laptop['colour'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Power supply</label>
          <textarea type="text" class="form-control" name="os">{{$laptop['power_supply'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">Operating System</label>
          <textarea type="text" class="form-control" name="os">{{$laptop['os'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">CPU Brand Name</label>
          <textarea type="text" class="form-control" name="cpu_brand_name">{{$laptop['cpu_brand_name'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">CPU Power Limit</label>
          <input type="text" class="form-control" name="cpu_power_limit" value="{{$laptop['cpu_power_limit'] }}"/>
        </div>

        <div class="form-group">
          <label for="name">Total Memory Size</label>
          <input type="text" class="form-control" name="total_mem_size" value="{{$laptop['total_mem_size'] }}"/>
        </div>

        <div class="form-group">
          <label for="name">Dive Capacity</label>
          <textarea type="text" class="form-control" name="drive_capacity">{{$laptop['drive_capacity'] }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">Computer Serial Number</label>
          <input type="text" class="form-control" name="com_serial_number" value="{{$laptop['com_serial_number'] }}"/>
        </div>

        <div class="form-group">
          <label for="name">Driver Description</label>
          <textarea rows="4" type="text" class="form-control" name="drive_des">{{$laptop['drive_des'] }}</textarea>
        </div>

          <div class="form-group">
          <label for="name">Video Card</label>
          <textarea rows="4" type="text" class="form-control" name="videocard">{{$laptop['videocard'] }}</textarea>
        </div>

          <div class="form-group">
          <label for="name">Network</label>
          <textarea rows="4" type="text" class="form-control" name="network">{{$laptop['network'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Comments/label>
          <textarea type="text" class="form-control" name="os">{{$laptop['comments'] }}</textarea>
        </div>
        <div class="form-group">
          <label for="name">Location</label>
          <textarea type="text" class="form-control" name="os">{{$laptop['location'] }}</textarea>
        </div>
        <!-- Update button -->
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection