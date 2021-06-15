@extends('layouts.dashboard')

@section('content')
    <main>
        <a href="{{ route('admin.products.create') }}"><input type="button"value="Aggiungi Prodotto" ></a>
        <ul>
            @foreach ($products as $product)
                <li>
                    {{$product->name}} 
                    <a href="{{ route('admin.products.show', $product->id) }}"><input type="button"value="SHOW" ></a>
                    <a href="{{ route('admin.products.edit', $product->id) }}"><input type="button"value="EDIT" ></a>
                    <form class="d-inline-block" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            X
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </main>
@endsection