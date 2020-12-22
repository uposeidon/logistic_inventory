<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/offcanvas.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body class="bg-light">
    <!-- top @nav start -->
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="{{ route('user.dashboard') }}">Data Panel</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if (Route::currentRouteName() == 'user.dashboard') active @endif">
            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item @if (Route::currentRouteName() == 'user.csv.create') active @endif">
            <a class="nav-link" href="{{ route('user.csv.create') }}">New Supplier CSV</a>
          </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">{{ Auth::user()->name }}</a>
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
    <div role="main" class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" ></script> 
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>   

</body>
</html>
