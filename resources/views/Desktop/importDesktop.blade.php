@extends('layouts/app')
@section('content')
<div class="container">
	<div class="card bg-light mt-3">
		<div class="card-header">
			Import CSV desktop
		</div>
		<div class="card-body">
			<h2 style="color:red;" >DO NOT IMPORT PRE-RELEASE PRODUCTS!</h2>
			<form action="{{ url('/desktop/import') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="file" name="csvfile" accept=".csv, .txt" class="form-control">
				<br>
				<button class="btn btn-success">Import desktop Data</button>
			</form>
		</div>
	</div>
</div>
@endsection
