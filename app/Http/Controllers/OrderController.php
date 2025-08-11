<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', auth()->id())->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function store()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('error', 'Done ');
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'total_price' => $cart->items->sum(fn($item) => $item->product->price * $item->quantity)
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        $cart->items()->delete();

        return redirect()->route('orders.index')->with('msg', 'Done');
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}

