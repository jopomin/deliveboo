@extends('layouts.app')


@section('content')
<ul>
    @foreach ($restaurants as $restaurant)
    <div class="restaurant_card">
        <div class="card_image">
            <img src="{{asset('img/restaurants/' . $restaurant->image)}}" alt="">
        </div>
    </div>
    <li>
        {{$restaurant->name}}  <a href="{{ route('restaurants_details', $restaurant->id) }}"><input type="button"value="VEDI RISTORANTE" ></a>
    </li>
    @endforeach
</ul>
@endsection