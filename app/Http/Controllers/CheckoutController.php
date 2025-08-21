<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
        // جلب الكارت مع المنتجات
        $carts = Cart::with('proudect')->where('user_id', Auth::id())->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart')->with('msg', 'Your cart is empty!');
        }

        // حساب الإجمالي
        $total = $carts->sum(function ($cart) {
            return $cart->proudect->price * $cart->quantity;
        });

        // إنشاء الأوردر
        $order = Order::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'total'   => $total,
            'status'  => 'pending',
        ]);

        // حفظ كل منتج في order_items
        foreach ($carts as $item) {
            OrderItem::create([
                'order_id'    => $order->id,
                'proudect_id' => $item->proudect->id,
                'quantity'    => $item->quantity,
                'price'       => $item->proudect->price,
            ]);
        }

        // مسح الكارت بعد حفظ الأوردر
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('order')
                         ->with('msg', 'Order placed successfully!');
    }
}
