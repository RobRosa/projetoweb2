<!DOCTYPE html>
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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/all.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-defaults.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="row w-100 no-gutters">
                    <div class="col-md-2 text-center text-md-left">
                        <a class="navbar-brand m-0" href="{{ url('/') }}">
                            {{ config('app.name', 'Loja') }}
                        </a>
                    </div>

                    <div class="col-lg-5 col-sm-10">
                        <!-- Left Side Of Navbar -->
                        <form class="form-inline justify-content-center justify-content-md-end my-1" method="get" action="/pesquisa">
                            <input style="width: 60%;" class="form-control mr-sm-2" type="pesquisa" placeholder="Pesquisar" aria-label="Search" name="query">
                            <button class="btn btn-primary my-2 my-sm-0">Pesquisar</button>
                        </form>
                    </div>
                    <div class="col-lg-5 text-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Categorias</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/categorias/1/eletronicos">Eletrônicos</a>
                                        <a class="dropdown-item" href="/categorias/2/brinquedos">Brinquedos</a>
                                        <a class="dropdown-item" href="/categorias/3/roupas">Roupas</a>
                                        <a class="dropdown-item" href="/categorias/4/livros">Livros</a>
                                        <a class="dropdown-item" href="/categorias/5/eletrodomesticos">Eletrodomésticos</a>
                                        <a class="dropdown-item" href="/categorias/6/esportes">Esportes</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cart.myCart') }}" class="nav-link">
                                        <i class="fas fa-shopping-cart text-secondary"></i>
                                        Meu Carrinho <span class="badge badge-primary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                    </a>
                                </li>
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <img class="rounded-circle" src="{{ asset('storage/user/' . Auth::user()->image) }}" style="max-width: 25px; display: inline;" > 
                                            {{ Auth::user()->name }} 
                                            <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
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
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="text-center mt-4 py-2" style="background-color: #555; color: #fff">
            <p class="my-0">&copy; Copyright Robson Rosa & Rodrigo Scotti - team AmamosWeb2Py</p>
        </footer>
    </div>
</body>
</html>
