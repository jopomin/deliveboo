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
                <?php $array_string = explode('.', $category->image); $first_word = $array_string[0];?>
                <img src="{{ $first_word == $category->slug ? asset('img/categories/' . $category->image) : asset('storage/' . $category->image) }}" alt="{{$category->name}}">
            </div>
        </div>
    </div>
</div>
@endsection