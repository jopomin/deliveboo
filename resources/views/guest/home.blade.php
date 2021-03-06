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
            <nav class="w_80">
                <div class="logo">
                    <img src="{{asset('img/deliveboo_logo.png')}}" alt="Deliveboo Logo">
                </div>
                <input type="checkbox" id="home_nav_toggle">
                <div class="hamburger_nav">
                    <label for="home_nav_toggle" class="fas fa-hamburger"></label>
                    <div class="dropdown_nav">
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
                    </div>
                </div>
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
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
                <div class="jumbo_pattern">
                    <img src="{{asset('img/cutlery.png')}}" alt="">
                </div>
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
            </div>
            <div class="slider_box">
                <h1>I tuoi piatti preferiti, consegnati da noi.</h1>
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
                            <div class="card_container">
                                <h1>Scegli il meglio per te!</h1>
                                <div class="w_80">
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/delivery.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>Ricevi tutto a casa tua nel pi?? breve tempo possibile</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/eating_together.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>Puoi sorprendere il tuo partner con un'ampia scelta di prodotti</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/special_event.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>Anche un evento speciale pu?? trasformarsi in qualcosa di unico</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/breakfast.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>Vuoi fare una colazione diversa dal solito?</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/hamburger.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>McDonald o Kebab? A te la scelta</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_content">
                                        <div class="top_card">
                                            <div class="card_content_img">
                                                <img src="{{asset('img/cards/ice_cream.svg')}}" alt="delivery">
                                            </div>
                                        </div>
                                        <div class="bottom_card">
                                            <div class="text_bottom_card">
                                                <h2>Come non concludere la giornata con un bel gelato!</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                        <footer>
                            <div class="w_80">
                                <div class="logo_footer">
                                    <img src="img/deliveboo_logo_white.png" alt="Logo Deliveboo">
                                </div>
                                <div class="social_footer">
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-youtube"></i>
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="copyright">
                                    <small>?? 2021 Deliveboo</small>
                                </div>
                            </div>
                        </footer>
                        <div class="src_res_main_cont" v-if="results" @click="closeRes">
                            <div class="src_res_box">
                                <div class="src_res_controller">
                                    <div class="src_res_ctrl_txt">
                                        <p>Risultati Ricerca</p>
                                    </div>
                                    <div class="close_src_res" @click="closeRes"><i class="fas fa-window-close"></i></div>
                                </div>
                                <div class="src_results">
                                    <a class="src_res_card" v-if="filteredRest.length > 0" :href="'restaurant/'+rest.id" v-for="rest in filteredRest">
                                        <div class="src_res_card_pic">
                                            <img :src="'img/restaurants/'+rest.image" :alt="rest.name">
                                        </div>
                                        <div class="src_res_card_text">
                                            <h2>@{{rest.name}}</h2>
                                        </div>
                                    </a>
                                    <div class="no_res" v-if="filteredRest.length == 0">
                                        <p>Nessun ristorante corrisponde ai criteri di ricerca</p>
                                    </div>
                                </div> 
                            </div> 
                            <!-- Scripts -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/vue"></script>
                            <script src="{{asset('js/main.js')}}"></script>
                            
                        </body>
                        </html>
                        