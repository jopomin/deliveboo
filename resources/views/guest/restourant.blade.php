@extends('layouts.app')


@section('content')
<ul>
    @foreach ($restourants as $restourant)
    <li>
        {{$restourant->name}}  <a href="{{ route('restourants_details', $restourant->id) }}"><input type="button"value="VEDI RISTORANTE" ></a>
    </li>
    @endforeach
</ul>
@endsection