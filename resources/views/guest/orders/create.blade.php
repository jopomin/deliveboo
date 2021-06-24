@extends('layouts.app')


@section('content')

<div id="root">
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
            <a href="#" @click="printCarts">Tutti gli ordini</a>
            <div class="carrelli"><p v-for="cart in carts">@{{cart.total_price}}</p></div>
            <textarea class="form-control" name="order_comment" id="order_comment" cols="30" rows="10"></textarea>
            <textarea class="form-control" name="product_comment" id="product_comment" cols="30" rows="10"></textarea>
            <?php $total = 0; ?>
            @foreach ($cart as $id => $product)
            <?php $total += $product['price'] * $product['quantity']; ?>
            <div class="row">
                <div class="col-sm-3 hidden-xs"><img src="{{ $product['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                <div class="col-sm-3">
                    <input name="products[]" class="form-check-input" type="checkbox" value="{{ $id }}" checked>
                    
                    <label class="form-check-label">
                        {{ $product['name'] }}
                    </label>
                    
                </div>
                <div class="col-sm-3">
                    <h4 class="nomargin">{{ $product['price'] }}</h4>
                </div>
                <div class="col-sm-3">
                    <h4 class="nomargin">{{ $product['quantity'] }}</h4>
                </div>
            </div>
            @endforeach
            <label for="total_price">Prezzo totale:</label>
            <input class="form-control" type="numeric" id="total_price" name="total_price" value="{{$total}}" readonly>
        </div>
        <div class="form-group">
    {{--         <button type="submit" class="boo_btn btn_form create_btn">
                <i class="far fa-save"></i>Invia ordine
            </button> --}}
        </div>
    </form>

</div>
<a href="{{route('payment')}}" class="boo_btn btn_form create_btn">
    <i class="far fa-save"></i>Effettua il pagamento
</a>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="{{asset('js/main.js')}}"></script>
@endsection