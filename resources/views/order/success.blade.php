@extends('layouts.guest')

@section('title', 'Order Successful | Alzuvi Bakery')

@section('content')
    <div class="success">
        <h1 class="page-title">Order Successful!</h1>
        <p class="page-sub">Thank you for ordering from Alzuvi Bakery.</p>
        <p class="success-no">Order Number: #{{ $number }}</p>

        <div class="success-card">
            <h2>Order Summary</h2>

            <div class="row"><span>Customer Name</span><span>{{ $order->customer_name }}</span></div>
            <div class="row"><span>WhatsApp Number</span><span>{{ $order->phone }}</span></div>
            <div class="row"><span>Order Date</span><span>{{ $order->order_date->format('d/m/Y') }}</span></div>

            <hr>

            @foreach ($order->details as $detail)
                <div class="row">
                    <span>{{ $detail->product->product_name }}</span>
                    <span>{{ $detail->quantity }} x Rp {{ number_format($detail->unit_price, 0, ',', '.') }}</span>
                </div>
            @endforeach

            <div class="row total"><span>Total Amount</span><span>Rp
                    {{ number_format($order->total_amount, 0, ',', '.') }}</span></div>
            <div class="row"><span>Order Status</span><span>{{ $order->status }}</span></div>

            <a href="{{ $waUrl }}" target="_blank" class="btn btn-wa">Konfirmasi lewat WhatsApp</a>
        </div>
    </div>
@endsection
