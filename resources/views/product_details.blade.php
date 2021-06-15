@extends('layouts.app')

@section('content')
    <main>
        <a href="{{ route('restourants_details', $products->user->id) }}"><input type="button"value="Back" ></a>
        <h1>
            {{$products->name}}
        </h1>
        <h5>{{$products->category->name}}</h5>
        <div class = "image">
            <img src="{{$products->image}}" alt="">
        </div>
        <div class="description">
            {{$products->description}}
        </div>
        <div class="info">
            {{$products->price}}
        </div>
    </main>
@endsection