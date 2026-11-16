@extends('layouts.guest')

@section('title', 'Products | Alzuvi Bakery')

@section('content')
    <h1 class="page-title">Our Products</h1>
    <p class="page-sub">Discover our freshly baked favorites</p>

    <form method="GET" action="{{ route('products') }}" class="filter">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk">

        <select name="category">
            <option value="">Semua kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}"
                    {{ request('category') == $category->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn">Cari</button>
    </form>

    <div class="grid">
        @forelse ($products as $product)
            @include('partials.product-card', ['product' => $product])
        @empty
            <p>Produk tidak ditemukan.</p>
        @endforelse
    </div>

    <div class="pagination-wrap">
        {{ $products->links() }}
    </div>
@endsection
