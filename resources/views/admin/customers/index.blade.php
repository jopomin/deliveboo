@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Clienti</h1>
        </div>
        <div class="bottom_content">
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