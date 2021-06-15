@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Categories</h1>
            <a href="{{route('admin.categories.create')}}">New categories</a>
        </div>
        <div class="bottom_content">
            @if(session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
            @endif
            @if(session('info_message'))
            <div class="alert alert-warning">
                {{ session('info_message') }}
            </div>
            @endif
            @if(session('status_delete'))
                <div class="alert alert-danger">
                    {{ session('status_delete') }}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Slug</td>
                        <td>image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->image}}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id)}}" class="btn far fa-eye"></a>
                            <a href="{{ route('admin.categories.edit', $category->id)}}" class="btn fas fa-edit"></a>
                            <form class="d-inline-block" action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn fas fa-trash-alt" onclick="return confirm('Sei sicuro di voler eliminare la categoria \'{{ $category->name }}\'?')"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('sweetalert::alert')

@endsection