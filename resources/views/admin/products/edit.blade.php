@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="titolo">
            <h1>Modifica prodotto {{$product->name}}</h1>
            <a href="{{ route('admin.products.index', $product->id) }}"><input type="button"value="Torna Indietro" ></a>
        </div>
        <div class="editForm">
            <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Immagine</label>
                    <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('image', $product->image) }}" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="Inizia a scrivere qualcosa..." required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Immagine</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il titolo" value="{{ old('price', $product->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <p>Seleziona la Disponibilita':</p>
                    <select name='visible'>
                        <option value="0">Disponibile</option>
                        <option value='1'>Non Disponibile</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <p>Seleziona la Categoria:</p>
                    <select name='category_id'>
                        <option value="">--</option>
                        @foreach ($categories as $category)
                        <option value='{{$category->id}}' {{ old('category_id') == $category->id ? 'selected="selected"' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <p>Seleziona le intolleranze:</p>
                    @foreach ($intolerances as $intolerance)
                        <div class="form-check @error('intolerances') is-invalid @enderror">
                            
                            <input name="intolerances[]" class="form-check-input" type="checkbox" value="{{ $intolerance->id }}">
                            
                            <label class="form-check-label">
                                {{ $intolerance->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('intolerances')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Salva prodotto
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection