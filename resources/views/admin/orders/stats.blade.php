@extends('layouts.dashboard')

@section('content')
<div class="content_box">
    <div class="content">
        <div class="top_content">
            <h1>Statistiche</h1>
        </div>
        <div class="bottom_content">
            <div id="orderschart" style="height: 300px;"></div>
            <div id="saleschart" style="height: 300px;"></div>
        </div>
    </div>
</div>
@push('js')

<script>
    const orderschart = new Chartisan({
        el: '#orderschart',
        url: "@chart('orders_chart')",
        hooks: new ChartisanHooks()
        .colors()
        .beginAtZero()
        .datasets([{
            type:'bar', 
            fill:false, 
            backgroundColor: '#7dc51e',
            hoverBackgroundColor: '#7dc51e7f'
            }])
    });
    const saleschart = new Chartisan({
        el: '#saleschart',
        url: "@chart('sales_chart')",
        hooks: new ChartisanHooks()
        .colors()
        .beginAtZero()
        .datasets([{
            type:'bar', 
            backgroundColor: '#2f93b5',
            hoverBackgroundColor: '#2f93b57f',
            }])
    });
</script>
@endpush

@endsection