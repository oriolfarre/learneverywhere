<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="logo">
                      <a href="{{ url('/') }}">
                          <!-- Learneverywhere -->
                          <img src="uploads/imatges/logotip.png" alt="Logotip Learneverywhere" height="65" width="65">
                          <!-- <img src="uploads/imatges/logotip.png" width="100px" height="100px" alt="logo learneverywhere" /> -->
                      </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      <li class="{{ Request::segment(1) === 'nosaltres' ? 'active' : null }}">
                      <a href="{{ url('/nosaltres') }}"><i class="fa fa-info-circle icons" aria-hidden="true"></i>Qui sóm?</a>
                      <li class="{{ Request::segment(1) === 'preguntes' ? 'active' : null }}">
                      <a href="{{ url('/preguntes') }}"><i class="fa fa-upload icons" aria-hidden="true"></i>Afegir preguntes</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:50px; height:50px; position:absolute; top:0px; left:-10px; border-radius:50%;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <!-- Profile Page -->
                                    <li>
                                        <a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>
                                            Perfil
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Sortir
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')



    </div>
    <!-- Footer section -->
        @include('layouts.footer')
        <!-- End footer section -->

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="js/libs.js"></script>
    @yield('scripts')
</body>
</html>
