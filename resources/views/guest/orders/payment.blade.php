@extends('layouts.app')
@section('content')


{{-- Successo della transazione --}}

@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

{{-- Errore a livello di disponibilità --}}

@if(count($errors) > 0)
    <div class="alert alert-dange">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form Pagamento --}}
<?php $order = session('cart');
      $total = 0;
      foreach ($order as $item) {
        $total += $item['price'] * $item['quantity'];
      }?>
<div class="content">
    <form method="post" id="payment-form" action="{{ url('/payment/checkout')}}">
        @csrf
        <section>
            <label for="amount">
                <span class="input-label">Totale</span>
                <div class="input-wrapper amount-wrapper">
                    {{-- Modificare il value per inserire il prezzo del carrello --}}
                    <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$total}}" readonly>
                </div>
            </label>

            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Test Transaction</span></button>
    </form>
</div>

{{-- Script --}}

<script type="application/javascript" src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
<script type="application/javascript">
var form = document.querySelector('#payment-form');
var client_token = "{{ $token }}";
braintree.dropin.create({
  authorization: client_token,
  selector: '#bt-dropin',
  paypal: {
    flow: 'vault'
  }
}, function (createErr, instance) {
  if (createErr) {
    console.log('Create Error', createErr);
    return;
  }
  form.addEventListener('submit', function (event) {
    event.preventDefault();
    instance.requestPaymentMethod(function (err, payload) {
      if (err) {
        console.log('Request Payment Method Error', err);
        return;
      }
      // Add the nonce to the form and submit
      document.querySelector('#nonce').value = payload.nonce;
      form.submit();
    });
  });
});
</script>   
@endsection