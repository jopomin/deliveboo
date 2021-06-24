@extends('layouts.dashboard')

@section('content')
<div class="cards">
    <div class="card_single">
        <div>
            <h1>{{count($orders_count)}}</h1>
            <span>Ordini</span>
        </div>
        <div class="statistic_image">
            <img src="{{ asset('img\statistic.png') }}" alt="">
        </div>
        <div>
            <i class="fas fa-shipping-fast"></i>
        </div>
    </div>
    <div class="card_single">
        <div>
            <h1>{{count($products)}}</h1>
            <span>Prodotti</span>
        </div>
        <div class="statistic_image">
            <img src="{{ asset('img\statistic.png') }}" alt="">
        </div>
        <div>
            <i class="fas fa-utensils"></i>
        </div>
    </div>
    <div class="card_single">
        <div>
            <h1>{{count($categories_count)}}</h1>
            <span>Categorie</span>
        </div>
        <div class="statistic_image">
            <img src="{{ asset('img\statistic.png') }}" alt="">
        </div>
        <div>
            <i class="fas fa-clipboard-list"></i>
        </div>
    </div>
    <div class="card_single">
        <div>
            <h1>€{{$sale}}</h1>
            <span>Guadagni</span>
        </div>
        <div class="statistic_image">
            <img src="{{ asset('img\statistic_white.png') }}" alt="">
        </div>
        <div>
            <i class="fas fa-coins"></i>
        </div>
    </div>
</div>
<div class="recent_box">
    <div class="recent_orders">
        <div class="card">
            <div class="card_header">
                <h3>Ordini recenti</h3>
                <a href="{{route('admin.orders.index')}}">Vedi tutto<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card_body">
                <table>
                    <thead>
                        <tr>
                            <td width="50%">Prodotto</td>
                            <td>Prezzo</td>
                            <td class="qt">Qt</td>
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
    <div class="recent_costumers">
        <div class="card">
            <div class="card_header">
                <h3>Clienti recenti</h3>
                <a href="{{route('admin.customers.index')}}">Vedi tutto<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="card_body">
                <table>
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Indirizzo</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recent_customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->address}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection