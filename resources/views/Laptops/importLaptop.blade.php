

@extends('layouts/app')
@section('content')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        Import CSV
        </div>
        <div class="card-body">
            <h2 style="color:red;" >DO NOT IMPORT PRE-RELEASE PRODUCTS!</h2>
            <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="csvfile" accept=".csv, .txt" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div>
@endsection
