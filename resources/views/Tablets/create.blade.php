@extends('layouts/app')

@section('content')
<div class="card-body" style="text-transform: capitalize;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Tablet</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tablets.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tablets.store') }}" method="POST" style="text-transform: capitalize;">
    @csrf

    <div class="card-body">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Brand:</strong>
                <select class="js-example-basic-multiple col-md-12"  id="brand">
                @foreach($brands as $brand)
                <option style="text-transform: capitalize;" value="{{$brand->name}}">{{$brand->name}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                <input type="text"  class="form-control" name="model" placeholder="model" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Colour:</strong> <br>
            @foreach($colors as $color)
            <input type="radio" id="{{$color->name}}" name="colour" value="{{$color->name}}">
            <label for="{{$color->name}}">{{$color->name}}</label><br>
            @endforeach
        </select>
    </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CPU manufacturer:</strong>
            <select class="js-example-basic-multiple col-md-12"  id="cpu_vendor" placeholder="OEM">
                @foreach($CPUMans as $CPUman)
                <option style="text-transform: capitalize;" value="{{$CPUman->name}}">{{$CPUman->name}}</option>
                @endforeach
              </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CPU Model:</strong>
            <input type="text"  class="form-control" name="cpu_model" placeholder="cpu_model" autocomplete="off" style="text-transform: capitalize;">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>RAM:</strong>
            <input type="text"  class="form-control" name="ram" placeholder="ram" autocomplete="off" style="text-transform: capitalize;">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Storage:</strong>
            <input type="text"  class="form-control" name="storage" placeholder="storage" autocomplete="off" style="text-transform: capitalize;">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Screen Size:</strong>
              <select class="js-example-basic-multiple col-md-12"  id="screen_size">
                @foreach($screenSizes as $screenSize)
                <option value="{{$screenSize->name}}">{{$screenSize->name}}"</option>
                @endforeach
              </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="text-transform: capitalize;">
            <strong>Power supply:</strong> <br>
            @foreach($powerSupplys as $PowerSupply)
            <input type="radio" id="{{$PowerSupply->name}}" name="power_supply" value="{{$PowerSupply->name}}">
            <label for="{{$PowerSupply->name}}">{{$PowerSupply->name}}</label><br>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Power Supply Details:</strong>
        <input type="text"  class="form-control" name="power_supply_details" placeholder="power_supply_details" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Accessories:</strong>
        <input type="text"  class="form-control" name="accessories" placeholder="accessories" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Serial Number:</strong>
        <input type="text"  class="form-control" name="sn" placeholder="sn" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Owner:</strong>
        <input type="text"  class="form-control" name="owner" placeholder="owner" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Location:</strong>
        <input type="text"  class="form-control" name="location" placeholder="location" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Comments:</strong>
        <input type="text"  class="form-control" name="comments" placeholder="comments" autocomplete="off" style="text-transform: capitalize;">
    </div>
</div>
{{-- submit button --}}
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>

</form>
@endsection