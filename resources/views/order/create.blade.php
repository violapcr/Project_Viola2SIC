@extends('layouts.guest')

@section('title', 'Order | Alzuvi Bakery')

@section('content')
    <h1 class="page-title" style="text-align: left;">Order</h1>
    <p class="page-sub" style="text-align: left;">Please fill in your order details.</p>

    <form method="POST" action="{{ route('order.store') }}" class="order">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">

        <div>
            <h2 class="order-h">Order Summary</h2>
            <div class="order-card">
                <div class="order-img">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}">
                    @else
                        Foto produk
                    @endif
                </div>

                <div class="order-info">
                    <span class="card-cat">{{ $product->category->category_name }}</span>
                    <h3 class="order-name">{{ $product->product_name }}</h3>
                    <p class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }} / pcs</p>

                    <div class="field order-qty">
                        <label for="quantity">Jumlah</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="50"
                            value="{{ old('quantity', 1) }}">
                        @error('quantity')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="order-total">
                        <span>Total</span>
                        <strong id="order-total">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="order-h">Customer Information</h2>
            <div class="order-box">
                <div class="field">
                    <label for="customer_name">Full Name</label>
                    <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
                    @error('customer_name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="phone">WhatsApp Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        placeholder="08xxxxxxxxxx">
                    @error('phone')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="address">Delivery Address</label>
                    <textarea id="address" name="address" rows="4">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn order-submit">Kirim pesanan</button>
                <p class="order-note">Pesanan akan dikonfirmasi lewat WhatsApp.</p>
            </div>
        </div>
    </form>

    <script>
        const qty = document.getElementById('quantity');
        const totalEl = document.getElementById('order-total');
        const price = {{ $product->price }};

        function updateTotal() {
            const n = Math.max(1, parseInt(qty.value) || 1);
            totalEl.textContent = 'Rp ' + (price * n).toLocaleString('id-ID');
        }

        qty.addEventListener('input', updateTotal);
        updateTotal();
    </script>
@endsection
