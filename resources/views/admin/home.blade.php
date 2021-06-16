@extends('layouts.dashboard')

@section('content')
<div class="cards">
    <div class="card_single">
        <div>
            <h1>45</h1>
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
            <h1>5</h1>
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
            <h1>€2k</h1>
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
                <h3>Recent Orders</h3>
                <button>See All<i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="card_body">
                <table>
                    <thead>
                        <tr>
                            <td width="50%">Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Payment</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Arizona Master</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                        <tr>
                            <td>Arizona</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                        <tr>
                            <td>Arizona</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                        <tr>
                            <td>Arizona</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                        <tr>
                            <td>Arizona</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                        <tr>
                            <td>Arizona</td>
                            <td>€10.00</td>
                            <td>1</td>
                            <td>Mastercard</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="recent_costumers">
        <div class="card">
            <div class="card_header">
                <h3>Recent Customers</h3>
                <button>See All<i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="card_body">
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Address</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                        <tr>
                            <td>Antonio Marrone</td>
                            <td>Via Alessandro Manzoni, 4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection