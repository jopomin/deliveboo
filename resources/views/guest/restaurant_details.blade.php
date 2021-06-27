@extends('layouts.cart')

@section('content')
<a href="{{ route('restaurant_list') }}"><input type="button"value="Back" ></a>
<div class="restaurant_name">
    <h1>
        {{$restaurant->name}}
    </h1>
</div>
@if(session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif
<div class="rest_info">
    <ul>
        <li>Indirizzo : {{$restaurant->address}}</li>
        <li>Contatti : {{$restaurant->email}}</li>
        <li>Referente : {{$restaurant->reference_name}}</li>
    </ul>
</div>
<?php $cart = session('cart');?>
@if ($cart)
@foreach ($cart as $item)
    {{$item = $item['user_id']}}
@endforeach  
@endif
<div class="menu">
    <ul>
        @foreach ($menu as $product)
        <li>
            <a href="{{ route('product_details', ['id' => $product->id]) }}">{{$product->name}} </a> 
            - Prezzo:{{$product->price}}€
                <a href="{{ empty($cart) || $item == $product->user_id ? route('add_to_cart', ['id' => $product->id]) : route('reset_cart')}}"><input type="button" value="Aggiungi al carrello" ></a>
        </li>
        @endforeach
    </ul>
</div>
@endsection