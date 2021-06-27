@extends('layouts.app')
@section('content')

<div class="order_summary">
    <div class="os_cart_section">
        <h1>Riepilogo ordine</h1>
        <?php $total_price = 0.00; $total_qty = 0; ?>
        @foreach ($cart as $id => $product)
        <?php $total_price += $product['price'] * $product['quantity']; $total_qty += $product['quantity'];?>
        <div class="os_cart_prod">
            <div class="os_cart_prod_pic">
                <img src="{{ $product['photo'] }}" alt="{{ $product['name'] }}">
            </div>
            <div class="os_cart_prod_name">
                <p>{{ $product['name'] }}</p>
            </div>
            <div class="os_cart_prod_price">
                <p>€ {{ $product['price'] }}</p>
            </div>
            <div class="os_cart_prod_quantity">
                <p>{{ $product['quantity'] }}</p>
            </div>
        </div>
        @endforeach
{{--         <label for="total_price">Prezzo totale:</label>
        <input class="form-control" type="numeric" id="total_price" name="total_price" value="€ {{$total_price}} / {{$total_qty}} prod." readonly> --}}
        <div class="os_total_cart">
            <div class="os_total_cart_text">
                <p>Prezzo Totale / Quantità Totale</p>
            </div>
            <div class="os_total_cart_price">
                <p>€ {{$total_price}}</p>
            </div>
            <div class="os_total_cart_qty">
                <p>{{$total_qty}}</p>
            </div>
        </div>
    </div>
    <div class="os_order_info_section">
        <h2>Inserisci i tuoi dati</h2>
{{--         <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <button type="submit" class="boo_btn btn_form create_btn">
                    <i class="far fa-save"></i>Invia ordine
                </button>
            </div>
        </form> --}}
        <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nominativo" id="name_label">Fornisci un nominativo</label>
        <input type="text" name="nominativo" id="nominativo">
        <label for="customer_phone">Numero di telefono</label>
        <input type="text" name="customer_phone" id="customer_phone">
        <label for="address_delivery">Indirizzo di consegna</label>
        <input type="text" name="address_delivery" id="address_delivery">
        <label for="doorbell">Dicitura Citofono/Campanello</label>
        <input type="text" name="doorbell" id="doorbell">
        <label for="order_comm">Note per l'ordine (facoltative)</label>
        <textarea name="order_comm" id="order_comm" cols="30" rows="10"></textarea>
        <label for="prod_comm">Note per i prodotti (facoltative)</label>
        <textarea name="prod_comm" id="prod_comm" cols="30" rows="10"></textarea>
        <button type="submit" class="boo_btn create_btn pay_btn">
            <i class="fas fa-credit-card"></i>Effettua il pagamento
        </button>
    </form>
    </div>
    </div>
</div>
@endsection