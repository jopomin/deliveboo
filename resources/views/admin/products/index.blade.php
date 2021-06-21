@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1 class="sect_main_title">Prodotti</h1>
            <a class="boo_btn create_btn" href="{{route('admin.products.create')}}">Inserisci Prodotto</a>
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
                        <td>Nome</td>
                        <td>Categoria</td>
                        <td>Descrizione</td>
                        <td>Immagine</td>
                        <td>Prezzo</td>
                        <td>Disponibilità</td>
                        <td>Azioni</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->image}}</td>
                        <td>€ {{$product->price}}</td>
                        <td>{{ $product->visible == 1 ? 'Disponibile' : 'Non disponibile'}}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id)}}" class="action_btn show far fa-eye"></a>
                            <a href="{{ route('admin.products.edit', $product->id)}}" class="action_btn edit fas fa-edit"></a>
                            <form class="d-inline-block" action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action_btn delete fas fa-trash-alt" onclick="return confirm('Sei sicuro di voler eliminare il prodotto \'{{ $product->name }}\'?')"></button>
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