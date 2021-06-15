<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Deliveboo</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="{{asset('img/deliveboo_logo.png')}}" alt="Deliveboo Logo">
            </div>
            <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Lavora con noi</a></li>
                @if (Route::has('login'))
                @auth
                <li><a href="{{ url('/admin') }}">Dashboard</a></li>
                @else
                @if (Route::has('register'))
                <a class="button login" href="{{ route('login') }}">Login</a>
                <a class="button register" href="{{ route('register') }}">Registrati</a>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
    </header>
    <main>
        <div class="jumbo">
            <div class="jumbo_image">
                <img src="{{asset('img/jumbo_image.gif')}}" alt="Jumbo image">
            </div>
            <div class="jumbo_content">
                <div class="jumbo_text">
                    <h1>I piatti che ami, a domicilio.</h1>
                </div>
                <div class="input_box">
                    <p>Inserisci il nome del ristorante che vuoi visitare</p>
                    <input type="checkbox" id="search_toggle">
                    <form action="">
                        <input type="text" name="name" id="name" placeholder="Inserisci il ristorante">
                        <button type="submit">Cerca</button>
                    </form>
                    <p>Effettua una <label for="search_toggle">ricerca avanzata <i class="fas fa-chevron-down"></i></label></p>
                    <form class="advanced" action="">
                        <input type="text" name="typologies" id="typologies" placeholder="Inserisci la tipologia di ristorante">
                        <input type="text" name="categories" id="categories" placeholder="Inserisci la categoria di prodotto">
                        <button type="submit">Cerca</button>
                    </form>
                </div>
            </div>
            <div class="links">
                <a href="{{ route('restourant_list') }}">Lista Ristoranti Prova</a>
            </div>
        </div>
    </main>
</body>
</html>
