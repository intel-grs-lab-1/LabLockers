@extends('layouts.app')

@section('style')
<style>
	* {box-sizing: border-box}
	body {font-family: "Lato", sans-serif;}

	/* Style the tab */
	.tab {
		float: left;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		width: 10%;
	}

	/* Style the buttons inside the tab */
	.tab button {
		display: block;
		background-color: inherit;
		color: black;
		padding: 22px 16px;
		width: 100%;
		border: none;
		outline: none;
		text-align: left;
		cursor: pointer;
		transition: 0.3s;
		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current "tab button" class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		float: left;
		padding: 0px 12px;
		border: 1px solid #ccc;
		width: 90%;
		border-left: none;
	}
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
</style>
@endsection

@section('content')
<div class="card-body">
  <h2>Items <i class="fas fa-box-open"></i></h2>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Colours')" id="defaultOpen">Colours</button>
    <button class="tablinks" onclick="openCity(event, 'Accessories')">Accessories</button>
    <button class="tablinks" onclick="openCity(event, 'Types')">Types</button>
    <button class="tablinks" onclick="openCity(event, 'ps')">Power Supply</button>
    <button class="tablinks" onclick="openCity(event, 'ss')">Screen Size</button>
    <button class="tablinks" onclick="openCity(event, 'tp')">Thunderbolt ports</button>
    <button class="tablinks" onclick="openCity(event, 'tt')">Touchscreen Type</button>
    <button class="tablinks" onclick="openCity(event, 'brand')">Brand</button>
    <button class="tablinks" onclick="openCity(event, 'cpumanu')">CPU Manufacture</button>
  </div>

  <div id="Colours" class="tabcontent">
    <h3>Colours</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal1">Add colors</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($colors as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div> 

  <div id="Accessories" class="tabcontent">
    <h3>Accessories</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal">Add accessories</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($acces as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table> 
  </div>

  <div id="Types" class="tabcontent">
    <h3>Types</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal2">Add type of device</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($types as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>

  <div id="ps" class="tabcontent">
    <h3>Power supply</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal3">Add Power supply</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($powersupply as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>

  <div id="ss" class="tabcontent">
    <h3>Screen Size</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal4">Add screen size</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($screensize as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>
  <div id="tp" class="tabcontent">
    <h3>No. thunderbolt ports</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal5">Add No. thunderbolt ports</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($thunderbolt as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>
  <div id="tt" class="tabcontent">
    <h3>Touchscreen types</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal6">Add Touchscreen types</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($touchscreen as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>
  <div id="brand" class="tabcontent">
    <h3>Brand</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal7">Add Brand</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($brand as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>
  <div id="cpumanu" class="tabcontent">
    <h3>CPU manufacturer</h3>
    <button class="button" href="#" data-toggle="modal" data-target="#exampleModal8">Add CPU manufacturer</button>
    <table class="table table-bordered">
      <tr style="text-transform:capitalize;">
        <th>ID</th>
        <th>Name</th>
      </tr>
      @foreach($cpuman as $product)
      <tr>
        <th>{{$product->id}}</th>
        <th>{{$product->name}}</th>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection
