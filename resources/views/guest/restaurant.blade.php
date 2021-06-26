@extends('layouts.app')


@section('content')
{{-- <ul>
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
</ul> --}}
<div class="restaurants_list_main_cont">
    <div class="rest_list_box">
        @foreach ($typologies as $typology)
        <div class="rest_list_page_main_cont">
            <h2>{{$typology->name}}</h2>
            <div class="rest_page_card_cont">
            @foreach ($typology->users as $restaurant)
                    <a href="{{ route('restaurants_details', $restaurant->id) }}" class="rest_page_card">
                        <div class="rest_page_card_pic">
                            <img src="{{asset('img/restaurants/' . $restaurant->image)}}" alt="{{$restaurant->name}}">
                        </div>
                        <div class="rest_page_card_text">
                            <h3>{{$restaurant->name}}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection