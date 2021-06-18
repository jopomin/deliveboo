@extends('layouts.app')

@section('content')
<a href="{{ route('restaurant_list') }}"><input type="button"value="Back" ></a>
    <div class="restaurant_name">
        <h1>
            {{$restaurant->name}}
        </h1>
    </div>
    
    <div class="rest_info">
        <ul>
            <li>Indirizzo : {{$restaurant->address}}</li>
            <li>Contatti : {{$restaurant->email}}</li>
            <li>Referente : {{$restaurant->reference_name}}</li>
        </ul>
    </div>
    <div class="menu">
        <ul>
            @foreach ($menu as $product)
                <li>
                    <a href="{{ route('product_details', ['id' => $product->id]) }}">{{$product->name}} </a> 
                    - Prezzo:{{$product->price}}€
                    <a href="{{ route('add_to_cart', ['id' => $product->id])}}"><input type="button"value="Aggiungi al carrello" ></a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection