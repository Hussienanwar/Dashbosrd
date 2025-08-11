<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Proudect;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::get();
        return view('dashboard.carts.index', compact('carts'));
    }

  


    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:proudects,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $carts = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        $carts->items()->updateOrCreate(
            ['product_id' => $request->product_id],
            ['quantity' => DB::raw("quantity + {$request->quantity}")]
        );

        return redirect()->back()->with('msg', ' Done');
    }

    
    // public function remove($itemId)
    // {
    //     CartItem::destroy($itemId);
    //     return redirect()->back()->with('msg', ' Done');
    // }

     
    // public function clear()
    // {
    //     $carts = Cart::where('user_id', auth()->id())->first();
    //     if ($carts) {
    //         $carts->items()->delete();
    //     }
    //     return redirect()->back()->with('msg', 'Done ');
    // }



}
