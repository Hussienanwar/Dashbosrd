<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ProfileController extends Controller
{
public function index()
{
    
    $orders = Order::with('proudect') // eager load المنتجات
    ->where('user_id', Auth::id())
    ->orderBy('created_at', 'asc')
    ->get();
    if(auth()->user()->role!=1){
        return view('website.profile', compact('orders'));
    }
    return view('dashboard.profile', compact('orders'));
}
    
    
}


