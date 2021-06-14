@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="editForm">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il titolo" value="Inserisci il nome" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Immagine</label>
                    <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Inserisci il titolo" value="Inserire link immagine" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Descrizione</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="Inizia a scrivere qualcosa..." required></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="numeric" name="price" class="form-control @error('price') is-invalid @enderror" required>
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
                        <option value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <p>Seleziona le intolleranze:</p>
                    @foreach ($intollerances as $intollerance)
                        <div class="form-check @error('intollerances') is-invalid @enderror">
                            
                            <input name="intollerances[]" class="form-check-input" type="checkbox" value="{{ $intollerance->id }}">
                            
                            <label class="form-check-label">
                                {{ $intollerance->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('intollerances')
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