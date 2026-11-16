@extends('layouts.guest')

@section('title', 'Beranda | Alzuvi Bakery')

@section('content')
    <section class="hero">
        <div class="hero-img">Foto banner</div>
        <div class="hero-text">
            <h1>Artisan Bread.</h1>
            <p>Enjoy a delightful selection of freshly baked breads, cakes, and cookies, made with quality ingredients and care.</p>
            <a href="{{ route('products') }}" class="btn">Lihat produk</a>
        </div>
    </section>

    <h2 class="section-title">Pilihan Favorit</h2>

    <div class="grid">
        @forelse ($products as $product)
            @include('partials.product-card', ['product' => $product])
        @empty
            <p>Belum ada produk.</p>
        @endforelse
    </div>
@endsection
