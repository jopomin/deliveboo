@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Utente</h1>
        </div>
        <div class="bottom_content">
            <h1>{{$user->name}}</h1>
            <h2>{{$user->reference_name}}</h2>
            <p>{{$user->address}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->vat_number}}</p>
        </div>
    </div>
</div>

@endsection