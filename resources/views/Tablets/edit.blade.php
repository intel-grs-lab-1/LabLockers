@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
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

<form action="{{ route('tablets.update',$tablet->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Brand:</strong>
                <input type="text" name="brand" value="{{ $tablet->brand }}" class="form-control" placeholder="Brand">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                <input type="text"  class="form-control" name="model" placeholder="model" value="{{ $tablet->model }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPU manufacturer:</strong>
                <input type="text"  class="form-control" name="cpu_vendor" placeholder="cpu_vendor" value="{{ $tablet->cpu_vendor }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CPU Model:</strong>
                <input type="text"  class="form-control" name="cpu_model" placeholder="cpu_model" value="{{ $tablet->cpu_model }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>RAM:</strong>
                <input type="text"  class="form-control" name="ram" placeholder="ram" value="{{ $tablet->ram }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Storage:</strong>
                <input type="text"  class="form-control" name="storage" placeholder="storage" value="{{ $tablet->storage }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Screen Size:</strong>
                <input type="text"  class="form-control" name="screen_size" placeholder="screen_size" value="{{ $tablet->screen_size }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Power supply:</strong>
                <input type="text"  class="form-control" name="power_supply" placeholder="power_supply" value="{{ $tablet->power_supply }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Power Supply Details:</strong>
                <input type="text"  class="form-control" name="power_supply_details" placeholder="power_supply_details" value="{{ $tablet->power_supply_details }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Accessories:</strong>
                <input type="text"  class="form-control" name="accessories" placeholder="accessories" value="{{ $tablet->accessories }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text"  class="form-control" name="sn" placeholder="sn" value="{{ $tablet->sn }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Owner:</strong>
                <input type="text"  class="form-control" name="owner" placeholder="owner" value="{{ $tablet->owner }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text"  class="form-control" name="location" placeholder="location" value="{{ $tablet->location }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments:</strong>
                <input type="text"  class="form-control" name="comments" placeholder="comments" value="{{ $tablet->comments }}" autocomplete="off" style="text-transform: capitalize;">
            </div>
        </div>
        {{-- Submit button --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>

</form>
@endsection