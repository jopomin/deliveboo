@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">{{$category->name}}</h1>
            <a class="boo_btn back_btn" href="{{route('admin.categories.index')}}">Tutte le Categorie</a>
        </div>
        <div class="bottom_content">
            <div class="category_pic">
                <img src="{{ asset('img/products') }}/{{$category->image}}" alt="{{$category->name}}">
            </div>
        </div>
    </div>
</div>
@endsection