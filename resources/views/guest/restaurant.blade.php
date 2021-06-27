@extends('layouts.app')


@section('content')
<h1 class="text-center">I NOSTRI RISTORANTI</h1>
<ul class="width_four_card">
    @foreach ($restaurants as $restaurant)
    <div class="prod_card linear shadow">
        <div class="prod_pic">
            <img src="{{asset('img/restaurants/' . $restaurant->image)}}" alt="">
        </div>
        <li>
            <div class='prod_info'>
                <h4 class="prod_text">{{$restaurant->name}}</h4>
                <a href="{{ route('restaurants_details', $restaurant->id) }}"><input class='boo_btn back_btn' type="button"value="VEDI RISTORANTE" ></a>
            </div>  
        </li>
    </div>
    @endforeach
</ul>

{{-- <div class="restaurants_list_main_cont">
    <div class="rest_list_box">
        @foreach ($typologies as $typology)
        <div class="rest_list_page_main_cont ">
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
</div> --}}
<h1 class="text-center">LE TIPOLOGIE DI RISTORANTI</h1>
<ul class="width_four_card">
    @foreach ($typologies as $typology)
    <div class="prod_card linear shadow">
        <div class="prod_pic">
            <img src="{{asset('img/restaurants/' . $restaurant->image)}}" alt="">
        </div>
        <li>
            <div class='prod_info'>
                <h4 class="prod_text">{{$typology->name}}</h4>
                {{-- <a href="{{ route('restaurants_details', $restaurant->id) }}"><input class='boo_btn back_btn' type="button"value="VEDI RISTORANTE" ></a> --}}
            </div>  
        </li>
    </div>
    @endforeach
</ul>
@endsection