<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Web prodavnica mK</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
     <link href="{{ asset('css/bsdark.css') }}" rel="stylesheet">
      <link href="{{ asset('css/sredjivanjeHr.css') }}" rel="stylesheet">
</head>
<body style="padding-top: 50px; background-image: url('{{asset('Slike/Wallpaper.jpg')}}');background-attachment: fixed; background-repeat:repeat">
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="padding: 0;">
            <div class="container">
                 <a class="navbar-brand" href="/"><img src="{{ asset('Slike/mKralj.png') }}" alt="" style="width: 100px; height: 40px"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Pocetna <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Proizvodi/prikazi">Proizvodi</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/ONama">O nama</a>
      </li>
      @guest
      @else
      @if(Auth::user()->role == 'Administrator')
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administracija
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Administracija/Korisnici">Administracija Korisnika</a>          
          <a class="dropdown-item" href="/Administracija/Roba">Administracija Robe</a>
         
          
        </div>      
      </li>
      @endif
      @endguest
    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('NalogKorisnika') }}"><img src="{{asset('ikonice/User.png')}}" width="25px" height="25px"/>Korisnicki nalog</a>
                                    <a class="dropdown-item" href="/Korisnik/KorpaKorisnika"><img src="{{asset('ikonice/Korpa.png')}}" width="25px" height="25px"/>Korpa</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="{{asset('ikonice/Logout.png')}}" width="25px" height="25px"/>{{ __('Logout') }}
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

    <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>
