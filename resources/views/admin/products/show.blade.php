@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>{{$product->name}}</h1>
            <a href="{{route('admin.products.index')}}">View All Products</a>
        </div>
        <div class="bottom_content">
            <div class="prod_info_cont">
                <div class="prod_pic">
                    <img src="{{$product->image}}" alt="{{$product->name}}">
                </div>
                <div class="prod_info">
                    <p class="prod_cat">{{$product->category->name}}</p>
                    <p class="prod_price">{{$product->price}}€</p>
                    <p class="prod_descr">{{$product->description}}</p>
                    @if($product->visible === 0)
                        <div class="prod_av av_yes">Prodotto Disponibile</div>
                    @else
                        <div class="prod_av av_no">Prodotto non Disponibile</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection