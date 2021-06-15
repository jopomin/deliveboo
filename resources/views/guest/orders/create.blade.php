@extends('layouts.app')

@section('content')
Sezione ordini
<form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <p>Seleziona i prodotti da acquistare:</p>
        @foreach ($products as $product)
        <div class="form-check @error('tags') is-invalid @enderror">
            <input name="tags[]" class="form-check-input" type="checkbox" id="{{ $product->id }}" value="{{ $product->id }}"
            {{ in_array($product->id, old('products', [])) ? 'checked=checked' : '' }}>
            <label class="form-check-label" for="{{$product->id}}">
                {{ $product->name }}
            </label>
        </div>
        @endforeach
        @error('products')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">
            <i class="far fa-save"></i> Invia al carrello
        </button>
    </div>
</form>
@endsection