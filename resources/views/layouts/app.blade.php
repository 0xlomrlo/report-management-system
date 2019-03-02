<html lang="{{ app()->getLocale() }}" dir="{{ (session('locale')) == 'ar'? 'rtl' : '' }}">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@lang('layout.app_name')</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link href="http://fonts.googleapis.com/earlyaccess/thabit.css" />

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/material-dashboard-rtl.css') }}" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css?family=Tajawal:500');

    body {
      font-family: 'Tajawal', sans-serif;
    }
  </style>
</head>

<body>

  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar.jpg') }}">

      <div class="logo">
        <a href="" class="simple-text logo-normal" style="font-size: 20px;">
          @lang('layout.app_name')
        </a>
        <div class="text-center">
          <small>@if (Auth::check()) {{ Auth::user()->username }} @endif</small>
        </div>
      </div>
      @if (Auth::check())
      <div class="sidebar-wrapper">
        <ul class="nav">



            <li class="nav-item active " >
                <a class="nav-link" href="" style="background-color: coral;">
                  <i class="material-icons">add_box</i>
                  <p> @lang('layout.create_report') </p>
                </a>
              </li>




          <li class="nav-item {{ request()->is('reports'.'*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reports.index') }}">
              <i class="material-icons">description</i>
              <p>@lang('layout.reports')</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('users'.'*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="material-icons">person</i>
              <p>@lang('layout.users_management')</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('groups'.'*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('groups.index') }}">
              <i class="material-icons">group_work</i>
              <p>@lang('layout.groups_management')</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('roles'.'*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('groups.index') }}">
              <i class="material-icons">group</i>
              <p>@lang('layout.roles_management')</p>
            </a>
          </li>
        </ul>
      </div>
      @endif
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">@yield('navbar')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <div class="navbar-form">
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="material-icons">translate</i>
                  <p class="d-lg-none d-md-block">
                    @lang('layout.language')
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  @if (session('locale') == 'ar')
                  <a class="dropdown-item" href="{{ route('locale','en') }}">English</a>
                  @else
                  <a class="dropdown-item" href="{{ route('locale', 'ar') }}">العربية</a>
                  @endif
                </div>
              </li>
              @if (Auth::check())
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    @lang('layout.account')
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">

                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('layout.logout')</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">

        @if(session()->has('success'))
        <div class="container">
          <div class="alert alert-success">
            <span>
              {{ session()->get('success') }}
            </span>
          </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="container">
          <div class="alert alert-danger">
            <span>
              {{ session()->get('error') }}
            </span>
          </div>
        </div>
        @endif

        @if ($errors->any())
        <div class="container">
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>
              {{ $error }}
            </span>
            @endforeach
          </div>
        </div>
        @endif
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <script>
    window.setTimeout(function () {
      $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 4000);
  </script>

  <script src="{{ asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('js/material-dashboard.js') }}"></script>

</body>

</html>