@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Prodotto</th>
            <th style="width:10%">Prezzo</th>
            <th style="width:8%">Quantità</th>
            <th style="width:22%" class="text-center">Subtotale</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0 ?>
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ;?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td >
                        <a href="{{ route('removecart', ['id' => $id])}}"><button type="submit"><i class="fa fa-refresh"></i></button></a>
                        <a href="{{ route('updatecart', ['id' => $id])}}"><button type="submit"><i class="fa fa-refresh"></i></button></a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Totale {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="#"> Ritorna al Ristorante</a></td>
            <td><a href="{{ route('reset_cart')}}"></i> Resetta il carrello</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Totale €{{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
@endsection