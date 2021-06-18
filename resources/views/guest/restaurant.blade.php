@extends('layouts.app')


@section('content')
@if(session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif
<ul>
    @foreach ($restaurants as $restaurant)
    <li>
        {{$restaurant->name}}  <a href="{{ route('restaurants_details', $restaurant->id) }}"><input type="button"value="VEDI RISTORANTE" ></a>
    </li>
    @endforeach
</ul>
@endsection