<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Deliveboo') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <input type="checkbox" id="nav_toggle">
    <div class="sidebar">
        <a href="{{route('guest.homepage')}}" class="sidebar_brand">
            <img src="{{ asset('img\deliveboo_logo_white.png') }}" alt="Logo Deliveboo">
        </a>
        <a href="{{route('guest.homepage')}}" class="sidebar_mini_brand">
            <img class="mini" src="{{ asset('img\deliveboo_logo_white_mini.png') }}" alt="Logo Deliveboo">
        </a>
        <div class="sidebar_menu">
            <ul>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.homepage' ? 'active' : null }}"
                        href="{{route('admin.homepage')}}">
                        <i class="fas fa-igloo"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.users.index' ? 'active' : null }}"
                        href="{{route('admin.users.index')}}">
                        <i class="fas fa-user"></i>
                        <span>Utente</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.orders.index' ? 'active' : null }}"
                        href="{{route('admin.orders.index')}}">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Ordini</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.customers.index' ? 'active' : null }}"
                        href="{{route('admin.customers.index')}}">
                        <i class="fas fa-users"></i>
                        <span>Clienti</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.products.index' ? 'active' : null }}"
                        href="{{route('admin.products.index')}}">
                        <i class="fas fa-utensils"></i>
                        <span>Prodotti</span>
                    </a>
                </li>
                <li>
                    <a class="{{ Request::route()->getName() == 'admin.categories.index' ? 'active' : null }}"
                        href="{{route('admin.categories.index')}}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Categorie</span>
                    </a>
                </li>
                <li>
                    <a class=""
                        href="">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistiche</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
        <div class="pattern">
            <img src="{{ asset('img\pattern_dashboard.png') }}" alt="">
        </div>
    </div>
</div>
<div class="main_content">
    <header>
        <div class="hamburger">
            <label for="nav_toggle">
                <i class="fas fa-bars"></i>
            </label>
            <h2>
                Dashboard
            </h2>
        </div>
        <div class="search_wrapper">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="Cerca">
        </div>
        <div class="user_wrapper">
            <img src="{{asset('img\restaurants\\')}}{{Auth::user()->image}}" alt="{{Auth::user()->name}}" width="50px" height="50px">
            <div>
                <h4>{{Auth::user()->name}}</h4>
                <small>{{Auth::user()->reference_name}}</small>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</div>
</body>