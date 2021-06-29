@extends('layouts.cart')

@section('content')
    <div class="rest_det_main_cont">

        {{-- RESTURANT PAGE: MAIN INFO --}}
        
        <div class="rest_det_main_info">
            <div class="rest_det_main_info_pic">
                <img class='rounded-lg shadow' src="{{asset('img/restaurants/' . $restaurant->image)}}" alt="{{$restaurant->name}}">
            </div>
            <div class="rest_det_main_info_text">
                <div class="rest_det_name">
                    <h1 class="rest_det_header">
                        {{$restaurant->name}}
                    </h1>
                </div>
                
                @if(session('success_message'))
                <div class="alert alert-success">
                    {{ session('success_message') }}
                </div>
                @endif
                
                <div class="rest_det_info">
                    <ul>
                        <li><strong>Indirizzo:</strong> {{$restaurant->address}}</li>
                        <li><strong>Contatti:</strong> {{$restaurant->email}}</li>
                        <li><strong>Referente:</strong> {{$restaurant->reference_name}}</li>
                        <li><strong>Tipologie:</strong>
                            @forelse ($restaurant->typologies as $type)
                            {{ $type->name }}{{ !$loop->last ? ',' : '' }}
                            @empty
                                -
                            @endforelse
                        </li>
                        <li><a href="{{ route('restaurant_list') }}">
                            <input class="boo_btn back_btn rest_det_btn" type="button" value="Torna ai Ristoranti">
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- RESTURANT PAGE: MENU --}}

        <div class="rest_det_menu">
                @foreach ($menu as $product)
                <div class="rest_prod_card shadow">
                    <div class="rest_prod_pic">
                        <img src="{{$product->image}}" alt="{{$product->name}}">
                        <div class="rest_prod_details">
                            <div class="rest_prod_descr">
                                {{\Illuminate\Support\Str::limit($product->description, 120, $end='...')}}
                            </div>
                            <div class="intol_cont">
                            @foreach ($product->intolerances as $intol)
                               <div class="intol_icon">
                                   <img src="{{asset('img/intol/' . $intol->icon)}}" alt="{{$intol->name}}">
                               </div> 
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="rest_prod_info">
                        <div class="rest_prod_text">
                            <a class="rest_prod_name" href="{{ route('product_details', ['id' => $product->id]) }}">
                                <h2>                                {{\Illuminate\Support\Str::limit($product->name, 23, $end='...')}}</h2>
                            </a>
                        </div>
                        <div class="rest_prod_cart">
                            <p class="rest_prod_price">€ {{$product->price}}</p>
                            <a class="boo_btn create_btn add_prod_btn" href="{{ route('add_to_cart', ['id' => $product->id])}}"><i class="fas fa-cart-plus"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection