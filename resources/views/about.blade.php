@extends('layouts.guest')

@section('title', 'About Us | Alzuvi Bakery')

@section('content')
    <h1 class="page-title" style="text-align: left;">About Us</h1>

    <section class="about">
        <div class="about-img">Foto bakery</div>
        <div class="about-text">
            <p class="about-lead">Experience authentic flavor in every
                bite with Alzuvi Bakery’s sweet breads, cookies, and cakes—baked to perfection using premium-quality
                ingredients.</p>
            <p>Customers can browse our curated catalog, place their orders effortlessly online, and confirm directly via WhatsApp.</p>
            <a href="{{ route('products') }}" class="btn btn-outline">Lihat produk</a>
        </div>
    </section>
@endsection
