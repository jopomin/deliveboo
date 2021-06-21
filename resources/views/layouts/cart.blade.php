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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myapp.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <header>
            
            <nav class="navbar  navbar-light bg-white shadow-sm">
                
                    <div class="logo">
                        <a href="{{route('guest.homepage')}}">
                            <img src="{{asset('img/deliveboo_logo.png')}}" alt="Deliveboo Logo">
                        </a>
                    </div>
                    <input type="checkbox" id="cart_toggle" checked>
                    <div class="dropdown">
                        <label for="cart_toggle" type="button" class="btn btn-info">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </label>
                        
                        <?php $total = 0 ?>
                        <div class="{{(!empty(session('cart'))) ? 'drop_menu' : ''}}">
                            <div class="row total-header-section">
                                @foreach((array) session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                @endforeach
                                @if($total>0)
                                <div class="total_order">
                                    <p>Totale: <span> <strong>€ {{ $total = number_format($total, 2) }}</strong></span></p>
                                </div>
                                @endif
                            </div>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <div class="order_detail">
                                <div class="order_image">
                                    <img src="{{ $details['photo'] }}" style="heigth:50px; width:50px">
                                </div>
                                <div class="order_name">
                                    <p>{{ $details['name'] }}</p>
                                    <span > <strong>€{{ $details['price'] }}</strong> </span> <span class="count"> Quantità: <strong>{{ $details['quantity'] }}</strong></span>
                                </div>
                                <div class="order_btn">
                                    <div class="btn_top">
                                        <a href="{{ route('updatecart', ['id' => $id])}}"><button type="submit"><i class="fas fa-caret-up"></i></button></a>
                                        <a href="{{ route('removecart', ['id' => $id])}}"><button type="submit"><i class="fas fa-caret-down"></i></button></a>
                                    </div>
                                    <form  action="{{ route('delete_cart', ['id'=>$id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            <a href="{{route('orders.create')}}" class="go_order">Procedi con l'ordine</a>
                            @endif
                        </div>
                            
                    </div>
            </nav>
        </header>
        
        <main class="py-4 content">
            @yield('content')
        </main>
    </div>
</body>
</html>
