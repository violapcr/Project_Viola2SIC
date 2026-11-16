<article class="card">
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
    @else
        <div class="card-ph">Foto produk</div>
    @endif
    <span class="card-cat">{{ $product->category->category_name }}</span>
    <h3>{{ $product->product_name }}</h3>
    <p class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
</article>
