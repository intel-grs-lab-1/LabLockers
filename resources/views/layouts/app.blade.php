<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LabLockers</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <script defer src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.12.1/js/v4-shims.js"></script>

  <!-- Styles -->
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <style type="text/css">
    div.dataTables_wrapper div.dataTables_filter{
      float: left;
      margin-left: 20%;
    }
    div.dataTables_wrapper div.dataTables_filter input{
      width: 600px;
      height: 38px;
    }
    div.dataTables_wrapper div.dataTables_filter label{
      font-size: 20px;
    }
  </style>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   @yield('style')


</head>
<body style="text-transform: capitalize;">
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          LabLockers <i class="fas fa-database"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               Desktops <i class="fas fa-desktop"></i> <span class="caret"></span>
             </a>

             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/desktop/viewall') }}">
                View All Desktops
              </a>
              <a class="dropdown-item" href="{{ url('/desktop/view/import') }}">
               Import(!)
             </a>
           </div>

         </li>
         <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           Tablets <i class="fas fa-tablet-alt"></i> <span class="caret"></span>
         </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('tablets.index') }}">
            View All tablets
          </a>
       </div>

     </li>
     <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       Laptops <i class="fas fa-laptop"></i> <span class="caret"></span>
     </a>

     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ url('/viewall') }}">
        View All Laptops
      </a>
      <a class="dropdown-item" href="{{ url('/view/import') }}">
       HWInfo Import
     </a>
     <a class="dropdown-item" href="{{ url('/view/importlaptops') }}">
     Import Laptops
   </div>

 </li>
<li class="nav-item dropdown">
  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    {{ Auth::user()->name }} <i class="far fa-user"></i><span class="caret"></span>
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>
</li>
@endguest
</ul>
</div>
</div>
</nav>

<!-- Modal accessories -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add accessories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-accessories') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Accessories Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal colour -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Colors</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-color') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Colors Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal type -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add accessories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-type') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Type Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize; ">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal type -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add accessories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-powerSupply') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Type Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal type -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add screen size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-screenSize') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Type Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal type -->
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add thunderbolt port #No.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-ThunderboltPorts') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Type Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
  </div>
</div>
</div>
<!-- Modal type -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add touchscreen type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-Touchscreen') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Type Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!-- Modal brand -->
<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-Brand') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Brand Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!-- Modal CPU Man -->
<div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add CPU Manufacture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('post-cpuMan') }}" >
         @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">CPU Manufacture Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Accessories Name" name="name" autocomplete="off" style="text-transform: capitalize;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>

<main class="py-4">
  @yield('content')
</main>
</div>


@yield('scripts')
</body>
</html>
