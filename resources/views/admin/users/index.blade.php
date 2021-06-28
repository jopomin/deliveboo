@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Utente</h1>
            <a href="{{ route('admin.users.edit', $user->id)}}" class="action_btn edit fas fa-edit"></a>
        </div>
        <div class="bottom_content">
            <h1>{{$user->name}}</h1>
            <img src="{{asset('img\restaurants\\')}}{{Auth::user()->image}}" style="width:250px" alt="">
            <h2 style="margin-top: 10px">{{$user->reference_name}}</h2>
            <div>{{$user->address}}</div>
            <div>{{$user->email}}</div>
            <div>P.IVA: {{$user->vat_number}}</div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection