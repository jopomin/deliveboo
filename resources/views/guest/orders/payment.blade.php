@extends('layouts.app')
@section('content')

{{-- Successo della transazione --}}

@if(session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif

{{-- Errore a livello di disponibilit√† --}}

@if(count($errors) > 0)
<div class="alert alert-dange">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<?php $total = 0; ?>
@if(is_array(session('cart')))
@foreach(session('cart') as $id => $details)
<?php $total += $details['price'] * $details['quantity'] ;?>
@endforeach
@endif

{{-- Form Pagamento --}}
<?php $order = session('cart');
$total = 0;
foreach ($order as $item) {
    $total += $item['price'] * $item['quantity'];
    $id_order = $_GET['id_order'];
}?>
<div class="content">
    
    <form method="post" id="payment-form" action="{{ route('checkout', ['id_order' => $id_order])}}">
        @csrf
        <section>
            <label for="amount">
                <span class="input-label">Totale</span>
                <div class="input-wrapper amount-wrapper">
                    {{-- Modificare il value per inserire il prezzo del carrello --}}
                    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{number_format($total, 2)}}" readonly>
                </div>
            </label>
            <div id="dropin-container"></div>
        </section>
        <input type="hidden" name="customer_name" value="{{$request['customer_name']}}">
        <input type="hidden" name="address_delivery" value="{{$request['address_delivery']}}">
        <input type="hidden" name="customer_phone" value="{{$request['customer_phone']}}">
        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Paga ora</span></button>
    </form>
</div>


<script type="application/javascript" src="https://js.braintreegateway.com/web/3.78.2/js/client.min.js"></script>
<script type="application/javascript" src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
<script type="application/javascript" 
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
<script type="application/javascript">
    const form = document.getElementById('payment-form');
    var client_token = "{{ $token }}";
    
    braintree.dropin.create({
        authorization: client_token,
        selector: '#dropin-container',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, dropinInstance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        
        form.addEventListener('submit', event => {
            event.preventDefault();
            
            dropinInstance.requestPaymentMethod((err, payload) => {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
</script>


@endsection