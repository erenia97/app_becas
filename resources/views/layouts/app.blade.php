<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />



  </head>
<body>
    <div id="app">
      
       <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-static-right">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right navbar-nav ml-auto">
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
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Perfil') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        
                    </ul>

                </div>
            </div>
        </nav>

        
  <div class="container-left" style="margin-left: 10px">
     <ul class="nav navbar-nav">

                     @if ( Auth::user()->tipo_usuario == 1 )
                            <li class="nav-item "  >
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('registar.beca') }}">{{ __('Registrar becas') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('requisitos') }}">{{ __('Ingresar Requisitos de becas') }}</a>
                            </li>
                             <li class="nav-item">
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('beneficios') }}">{{ __('Benefecios de Becas') }}</a>
                            </li>
                                 <li class="nav-item">
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('registar.beca') }}">{{ __('Solicitudes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('contacto') }}">{{ __('Contacto') }}</a>
                            </li>
                             <li class="nav-item">
                                <a class="text-md-left btn btn-light nav-link" href="{{ route('becas.requisitos') }}">{{ __('Becas Publicadas') }}</a>
                            </li>

                            @else 
                             <li class="nav-item">
                                <a class="text-md-left btn btn-light" href="{{ route('home') }}">{{ __('Perfil') }}</a>
                            </li>
                            @endif
                </ul>
            </div>
@endguest


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
   
@stack('scripts')
</html>
