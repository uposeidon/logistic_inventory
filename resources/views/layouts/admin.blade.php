<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
    @if (Route::currentRouteName() == 'admin.supplier.index')
      <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
      <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    @endif
    
</head>
<body class="bg-light">
    <!-- top @nav start -->
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if (Route::currentRouteName() == 'admin.dashboard') active @endif">
            <a class="nav-link" href="{{route('admin.dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item @if (in_array(Route::currentRouteName(),['admin.users.index','admin.users.edit'])) active @endif">
            <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
          </li>
          <li class="nav-item @if (Route::currentRouteName() == 'admin.users.create') active @endif">
            <a class="nav-link" href="{{ route('admin.users.create') }}">New User</a>
          </li>
          <li class="nav-item @if (in_array(Route::currentRouteName(),['admin.supplier.index','admin.supplier.show'])) active @endif">
            <a class="nav-link" href="{{ route('admin.supplier.index') }}">Origin Manifest</a>
          </li>
          <li class="nav-item @if (Route::currentRouteName() == 'admin.csv.create') active @endif">
            <a class="nav-link" href="{{ route('admin.csv.create') }}">Upload Manifest</a>
          </li>
          <li class="nav-item @if (in_array(Route::currentRouteName(),['admin.analyze.index','admin.analyze.view','admin.analyze.show'])) active @endif">
            <a class="nav-link" href="{{ route('admin.analyze.index') }}">Analyze</a>
          </li>
          
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" >{{ Auth::user()->name }}</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                    
            </li>
        </ul>
        
        </div>
    <!-- top @nav end -->
    </nav>
    <main role="main" class="container">
        @yield('content')
    </div>
   
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>   
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script> 
    <script src="{{ asset('js/offcanvas.js') }}" ></script>
    @if (Route::currentRouteName() == 'admin.supplier.index')
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script>
      $(document).ready(function() {
       $('.datepicker').datepicker({
          autoclose : true,
          todayHighlight: true,
          setDate: "0"
        });
      });
    </script>
    @endif
</body>
</html>