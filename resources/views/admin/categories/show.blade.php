@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>{{$category->name}} details</h1>
            <a href="{{route('admin.categories.index')}}">All categories</a>
        </div>
        <div class="bottom_content">
        </div>
    </div>
</div>
@endsection