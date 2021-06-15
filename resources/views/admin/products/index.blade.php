@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Products</h1>
            <a href="{{route('admin.products.create')}}">New Product</a>
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
                        <td>Name</td>
                        <td>description</td>
                        <td>image</td>
                        <td>price</td>
                        <td>available</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->image}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->visible}}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id)}}" class="btn far fa-eye"></a>
                            <a href="{{ route('admin.products.edit', $product->id)}}" class="btn fas fa-edit"></a>
                            <form class="d-inline-block" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn fas fa-trash-alt" onclick="return confirm('Sei sicuro di voler eliminare il prodotto \'{{ $product->name }}\'?')"></button>
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