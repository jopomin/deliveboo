@extends('layouts.app')

@section('content')
    <a href="{{ route('restourant_list') }}"><input type="button"value="Back" ></a>
    <div class="restourant_name">
        <h1>
            {{$restourant->name}}
        </h1>
    </div>
    <div class="rest_info">
        <ul>
            <li>Indirizzo : {{$restourant->address}}</li>
            <li>Contatti : {{$restourant->email}}</li>
            <li>Referente : {{$restourant->reference_name}}</li>
        </ul>
    </div>
    <div class="menu">
        <ul>
            @foreach ($menu as $product)
                <li>
                    <a href="{{ route('product_details', ['id' => $product->id]) }}">{{$product->name}} </a> - Prezzo:{{$product->price}}€  
                </li>
            @endforeach
        </ul>
    </div>

    <a href="#"><input type="button"value="Fai il tuo ordine" ></a>
@endsection