<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // إنشاء أوردر جديد (Checkout)
    public function placeOrder(Request $request)
    {
        $carts = Cart::with('proudect')->where('user_id', Auth::id())->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // حساب الإجمالي
        $total = $carts->sum(function($item) {
            return $item->proudect->price * $item->quantity;
        });

        // إنشاء الأوردر بدون تفاصيل المنتجات
        $order = Order::create([
            'user_id' => Auth::id(),
            'total'   => $total,
            'status'  => 'pending',
        ]);

        // إنشاء OrderItems لكل منتج في الكارت
        foreach ($carts as $item) {
            OrderItem::create([
                'order_id'    => $order->id,
                'proudect_id' => $item->proudect->id,
                'quantity'    => $item->quantity,
                'price'       => $item->proudect->price,
            ]);
        }

        // تفريغ الكارت بعد حفظ الأوردر
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order')->with('success', 'Order placed successfully!');
    }

    // المستخدم يشوف أوردراته
    public function index()
    {
        $orders = Order::with('items.proudect')
                        ->where('user_id', Auth::id())
                        ->orderBy('created_at', 'asc')
                        ->get();

        return view('website.orders.index', compact('orders'));
    }

    // المستخدم يشوف تفاصيل أوردر معين
    public function show($id)
    {
        $order = Order::with('items.proudect')
                      ->where('id', $id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();

        return view('website.orders.show', compact('order'));
    }

    public function showo($id)
    {
        $order = Order::with('items.proudect')
        ->findOrFail($id);

        return view('dashboard.show', compact('order'));
    }




    // الأدمن يشوف كل الأوردرات
    public function showAll()
    {
        $orders = Order::with('user', 'items.proudect')->orderBy('created_at', 'asc')->get();
        return view('dashboard.order', compact('orders'));
    }

    // الأدمن يمسح أوردر
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully!');
    }
}
