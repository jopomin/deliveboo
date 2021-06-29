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
        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <button class="button" type="submit"><span>Paga ora</span></button>
    </form>
</div>



<script type="application/javascript" src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
<script type="application/javascript">
    const form = document.getElementById('payment-form');
    var client_token = "<?php echo($token) ?>";

    braintree.dropin.create({
        authorization: client_token,
        selector: '#dropin-container',
        paypal: {
            flow: 'vault'
        }
    }, (createErr, dropinInstance) => {
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