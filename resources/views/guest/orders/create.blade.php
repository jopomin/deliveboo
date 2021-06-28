@extends('layouts.app')
@section('content')

<div class="order_summary">
    <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="os_order_info_section">
            <div class="os_cart_section form-group">
                <h1>Riepilogo ordine</h1>
                <?php $total = 0; ?>
                @foreach ($cart as $id => $product)
                <?php $total += $product['price'] * $product['quantity']; ?>
                <div class="row">
                    <div class="col-sm-3 hidden-xs cart_prod_box"><img src="{{ $product['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                    <div class="col-sm-3 cart_prod_box">
                        <input name="products[]" class="form-check-input" type="checkbox" value="{{ $id }}" checked>
                        
                        <label class="form-check-label">
                            {{ $product['name'] }}
                        </label>
                        
                    </div>
                    <div class="col-sm-3 cart_prod_box prqt_box">
                        <h4 class="nomargin">{{ $product['price'] }}</h4>
                    </div>
                    <div class="col-sm-3 cart_prod_box prqt_box">
                        <h4 class="nomargin">{{ $product['quantity'] }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <h2>Inserisci i tuoi dati</h2>
                <label for="customer_name" id="name_label">Fornisci un nominativo</label>
                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" required>
                @error('customer_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="customer_phone">Numero di telefono</label>
                <input type="text" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" id="customer_phone" required>
                @error('customer_phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="address_delivery">Indirizzo di consegna</label>
                <input type="text" name="address_delivery" class="form-control @error('address_delivery') is-invalid @enderror" id="address_delivery" required>
                @error('address_delivery')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="doorbell">Dicitura Citofono/Campanello</label>
                <input type="text" name="doorbell" class="form-control @error('doorbell') is-invalid @enderror" id="doorbell">
                @error('doorbell')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="order_comment">Note per l'ordine (facoltative)</label>
                <textarea class="form-control" name="order_comment" id="order_comment" cols="30" rows="10"></textarea>
                <label for="product_comment">Note per i prodotti (facoltative)</label>
                <textarea class="form-control" name="product_comment" id="product_comment" cols="30" rows="10"></textarea>
                <label for="total_price">Prezzo totale:</label>
                <input class="form-control" type="numeric" id="total_price" name="total_price" value="{{$total}}" readonly>
            </div>
            <div class="form-group">
                <button type="submit" class="boo_btn create_btn pay_btn">
                <i class="fas fa-credit-card"></i>Effettua il pagamento
                </button>
            </div>
        </div>
    </form>
</div>
@endsection