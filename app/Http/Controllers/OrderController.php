<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Ganti dengan nomor WhatsApp Alzuvi Bakery (awali 62, tanpa + dan tanpa 0)
    private const WHATSAPP_NUMBER = '6281234567890';

    public function create(Product $product)
    {
        $product->load('category');

        return view('order.create', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id'    => 'required|exists:products,product_id',
            'quantity'      => 'required|integer|min:1|max:50',
            'customer_name' => 'required|string|max:100',
            'phone'         => ['required', 'regex:/^08[0-9]{8,11}$/'],
            'address'       => 'required|string|max:500',
        ], [
            'quantity.required'      => 'Jumlah wajib diisi.',
            'quantity.min'           => 'Jumlah minimal 1.',
            'quantity.max'           => 'Jumlah maksimal 50.',
            'customer_name.required' => 'Nama wajib diisi.',
            'phone.required'         => 'Nomor WhatsApp wajib diisi.',
            'phone.regex'            => 'Nomor harus diawali 08 dan terdiri dari 10 sampai 13 digit.',
            'address.required'       => 'Alamat pengantaran wajib diisi.',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $order = DB::transaction(function () use ($data, $product) {
            $subtotal = $product->price * $data['quantity'];

            $order = Order::create([
                'customer_name' => $data['customer_name'],
                'phone'         => $data['phone'],
                'address'       => $data['address'],
                'order_date'    => now()->toDateString(),
                'status'        => 'Menunggu',
                'total_amount'  => $subtotal,
            ]);

            OrderDetail::create([
                'order_id'   => $order->order_id,
                'product_id' => $product->product_id,
                'quantity'   => $data['quantity'],
                'unit_price' => $product->price,
                'subtotal'   => $subtotal,
            ]);

            return $order;
        });

        return redirect()
            ->route('order.success', $order)
            ->with('success', 'Pesanan berhasil disimpan.');
    }

    public function success(Order $order)
    {
        $order->load('details.product');

        $number = 'ALZ' . str_pad($order->order_id, 4, '0', STR_PAD_LEFT);
        $items  = $order->details
            ->map(fn($d) => $d->quantity . ' x ' . $d->product->product_name)
            ->implode(', ');

        $message = "Halo Alzuvi Bakery, saya ingin konfirmasi pesanan {$number} "
        . "atas nama {$order->customer_name}: {$items}. "
        . 'Total Rp ' . number_format($order->total_amount, 0, ',', '.') . '.';

        $waUrl = 'https://wa.me/' . self::WHATSAPP_NUMBER . '?text=' . rawurlencode($message);

        return view('order.success', compact('order', 'number', 'waUrl'));
    }
}
