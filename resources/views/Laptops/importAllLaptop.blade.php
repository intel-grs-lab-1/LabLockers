

@extends('layouts/app')
@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{$message}}</strong>
</div>
@endif

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        Import CSV
        </div>

        <div class="card-body">
            <h2 style="color:red;" >DO NOT IMPORT PRE-RELEASE PRODUCTS!</h2>
            <form action="{{ url('/importLaptop') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="select_file" accept=".csv, .txt" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div>
@endsection
