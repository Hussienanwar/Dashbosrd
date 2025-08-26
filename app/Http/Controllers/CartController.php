<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\proudect;
use App\Models\Cart;

class CartController extends Controller
{
    // Add product to cart
    public function add($id)
    {
        $proudect = proudect::findOrFail($id);

        $cartItem = Cart::where('proudect_id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'proudect_id' => $proudect->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('msg', 'Product added to cart!');
    }

    // Show cart
    public function index()
    {
        $carts = Cart::with('proudect')
                    ->where('user_id', Auth::id())
                    ->get();
        return view('website.carts.index', compact('carts'));
    }


public function checkout()
{
    $carts = Cart::with('proudect')->where('user_id', Auth::id())->get();

    if ($carts->isEmpty()) {
        return redirect()->route('carts')->with('error', 'Your cart is empty!');
    }

    return view('website.checkout', compact('carts'));
}

    // Remove item from cart
    public function remove($id)
    {
        Cart::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('cart')->with('msg', 'Item removed from cart!');
    }





    // Update quantity
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cartItem = Cart::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return redirect()->route('cart')->with('msg', 'Cart updated!');
    }

public function updateQuantity(Request $request, $id)
{
    $item = Cart::findOrFail($id);

    if ($request->action === 'increase') {
        $item->quantity += 1;
    } elseif ($request->action === 'decrease' && $item->quantity > 1) {
        $item->quantity -= 1;
    }

    $item->save();

    return redirect()->back()->with('success', 'Quantity updated successfully!');
}




}