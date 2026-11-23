@extends('layouts.guest')

@section('title', $product->product_name . ' | Alzuvi Bakery')

@section('content')
    <p><a href="{{ route('products') }}" class="back">Kembali ke produk</a></p>

    <section class="detail">
        <div class="detail-img">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
            @else
                Foto produk
            @endif
        </div>

        <div class="detail-info">
            <span class="card-cat">{{ $product->category->category_name }}</span>
            <h1>{{ $product->product_name }}</h1>
            <p class="detail-desc">{{ $product->description }}</p>
            <p class="detail-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            {{-- Tautan ini diganti ke form pesanan di Tahap C --}}
            <a href="{{ route('order.create', $product) }}" class="btn">Pesan sekarang</a>
        </div>
    </section>

    @if ($related->count())
        <h2 class="section-title">Produk lainnya</h2>
        <div class="grid">
            @foreach ($related as $item)
                @include('partials.product-card', ['product' => $item])
            @endforeach
        </div>
    @endif
@endsection
