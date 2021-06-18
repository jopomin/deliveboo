@extends('layouts.app')


@section('content')

<form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" placeholder="Inserisci il tuo nominativo" value="" required>
        @error('customer_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" placeholder="Inserisci il tuo numero di telefono" value="" required>
        @error('customer_phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="text" name="address_delivery" class="form-control @error('address_delivery') is-invalid @enderror" placeholder="Inserisci l'indirizzo di spedizione" value="" required>
        @error('address_delivery')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="text" name="doorbell" class="form-control @error('doorbell') is-invalid @enderror" placeholder="Inserisci il campanello di casa" value="">
        @error('doorbell')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <textarea class="form-control" name="order_comment" id="order_comment" cols="30" rows="10"></textarea>
        <textarea class="form-control" name="product_comment" id="product_comment" cols="30" rows="10"></textarea>
        <?php $total = 0; ?>
        @foreach ($cart as $item)
        <?php $total += $item['price'] * $item['quantity']; ?>
        <div class="row">
            <div class="col-sm-3 hidden-xs"><img src="{{ $item['photo'] }}" width="100" height="100" class="img-responsive"/></div>
            <div class="col-sm-3">
                <h4 class="nomargin">{{ $item['name'] }}</h4>
            </div>
            <div class="col-sm-3">
                <h4 class="nomargin">{{ $item['price'] }}</h4>
            </div>
            <div class="col-sm-3">
                <h4 class="nomargin">{{ $item['quantity'] }}</h4>
            </div>
        </div>
        @endforeach
        <label for="total_price">Prezzo totale:</label>
        <input class="form-control" type="numeric" id="total_price" name="total_price" value="{{$total}}" readonly>
    </div>
    <div class="form-group">
        <button type="submit" class="boo_btn btn_form create_btn">
            <i class="far fa-save"></i>Invia ordine
        </button>
    </div>
</form>
@include('sweetalert::alert')
@endsection