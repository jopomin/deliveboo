@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Ordini</h1>
        </div>
        <div class="bottom_content">
            <div class="card_body">
                <table>
                    <thead>
                        <tr>
                            <td width="50%">Prodotto</td>
                            <td>Prezzo</td>
                            <td class="qt">qt</td>
                            <td class="quantity">Quantità</td>
                            <td>Data</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recent_orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{substr($order->date, 0, 10)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection