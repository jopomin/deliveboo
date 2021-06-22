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
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <div id="root">
        <header>
            <nav>
                <div class="logo">
                    <img src="{{asset('img/deliveboo_logo.png')}}" alt="Deliveboo Logo">
                </div>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="{{ route('restaurant_list') }}">I nostri ristoranti</a></li>
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
                        <div class="src_box">
                            <input v-model="query" type="text" name="name" id="name" placeholder="Inserisci il nome del ristorante">
                            <a class="deliv_btn" href="#" @click="searchName">Cerca</a>
                        </div>
                        <p>Effettua una <label for="search_toggle">ricerca avanzata <i class="fas fa-chevron-down"></i></label></p>
                        <form class="advanced" action="">
                            <div class="selection">
                                <select v-model="selType" name='typology'>
                                    <option value="">Seleziona la tipologia del ristorante</option>
                                    @foreach ($typologies as $typology)
                                    <option value='{{$typology->id}}'>{{$typology->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="selection">
                                <select v-model="selCat" name='category'>
                                    <option value="">Seleziona la categoria del prodotto</option>
                                    @foreach ($categories as $category)
                                    <option value='{{$category->id}}'>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>                                      
                            <a class="boo_btn create_btn" href="#" @click="totalSrc">Cerca</a>
                        </form>
                    </div>
                </div>
                <div class="src_res" v-if="results">
                    <div class="src_res_top_bar">
                        <div>
                            <p>Risultati</p>
                        </div>
                        <div class="close_res" @click="closeRes"><p>X</p></div>
                    </div>
                    <div class="src_results">
                        <a class="src_res_card" :href="'restaurant/'+rest.id" v-for="rest in filteredRest">
                            <img :src="'img/restaurants/'+rest.image" alt="">
                            <h2>@{{rest.name}}</h2>
                        </a>  
{{--                         <a class="typ_rest"  :href="'restaurant/'+rest.id">@{{rest.name}}</a>    --}}                 
                    </div>
                </div>
            </div>
            <div class="slider_box">
                <h1>Tanti menu da poter ordinare</h1>
                <div id="slider">
                    <input type="radio" name="slider" id="foto1" checked>
                    <input type="radio" name="slider" id="foto2">
                    <input type="radio" name="slider" id="foto3">
                    <input type="radio" name="slider" id="foto4">
                    <input type="radio" name="slider" id="foto5">
                    <label for="foto1" id="slide1"><img
                        src="{{asset('img/slider/foto1.jpg')}}"
                        alt=""></label>
                    <label for="foto2" id="slide2"><img
                        src="{{asset('img/slider/foto2.jpg')}}"
                        alt=""></label>
                    <label for="foto3" id="slide3"><img src="{{asset('img/slider/foto3.jpg')}}" alt=""></label>
                    <label for="foto4" id="slide4"><img
                        src="{{asset('img/slider/foto4.jpg')}}"
                        alt=""></label>
                    <label for="foto5" id="slide5"><img
                        src="{{asset('img/slider/foto5.jpg')}}"
                        alt=""></label>
                </div>
            </div>
        </main>
    </div>
                    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
</body>
</html>
                