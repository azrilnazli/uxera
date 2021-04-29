<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/b55bf4458b.js" crossorigin="anonymous"></script>
  

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/2-3.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body class="bg-dark text-white">
    <div id="app ">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid ">
                @guest
                <a class="navbar-brand " href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @else
                <a class="navbar-brand " href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest

                    @else
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                        <a class="nav-item nav-link {{ Route::currentRouteNamed( 'home' ) ?  'active' : '' }}" href="/home">Home</a>
                        @if($categories)
                           
                            @if( Route::currentRouteNamed('home'))
                                @include('parts/top_menu', [ 'current' => null ] )       
                            @endif

                            @if( Route::currentRouteNamed('play'))
                                @include('parts/top_menu', [ 'current' => $video->category_id ] )       
                            @endif

                            @if( Route::currentRouteNamed('by_category'))
                                @include('parts/top_menu', [ 'current' => $category_id ] )       
                            @endif

                        @endif
                       
            
                        </div>
                    </div>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-edit"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(file_exists( public_path().'/thumbnails/avatar-'. auth()->user()->id . '.png' )) 
                                <img style="width:40px" class="img-fluid  rounded rounded-circle" src="/thumbnails/avatar-1.png" /> 
                                @else
                                <strong>{{ Auth::user()->name }}</strong>
                                @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                                    <a class="dropdown-item" href="{{ route('payment.status') }}">
                                    <i class="fas fa-edit"></i> {{ __('Subscription') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="fas fa-user"></i> {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('change_password') }}">
                                    <i class="fas fa-key"></i> {{ __('Password') }}
                                    </a>
      
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('js')
</body>
</html>
