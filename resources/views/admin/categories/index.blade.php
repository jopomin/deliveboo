@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">Categorie</h1>
            <a class="boo_btn create_btn" href="{{route('admin.categories.create')}}">Inserisci Categoria</a>
        </div>
        <div class="bottom_content">
            @if(session('status_create'))
            <div class="alert alert-success">
                {{ session('status_create') }}
            </div>
            @endif
            @if(session('status_update'))
            <div class="alert alert-warning">
                {{ session('status_update') }}
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
                        <td>Nome</td>
                        <td>Slug</td>
                        <td>Immagine</td>
                        <td>Azioni</td>
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
@endsection