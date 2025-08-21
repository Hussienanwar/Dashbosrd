<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\proudect;

class FavoriteController extends Controller
{
    // Add product to favorites
    public function add($id)
    {
        $product = proudect::findOrFail($id);
        $exists = Favorite::where('product_id', $id)->where('user_id', Auth::id())->exists();

        if (!$exists) {
            Favorite::create([
                'user_id' => Auth::id(),
                'proudect_id' => $product->id
            ]);
        }

        return back()->with('msg', 'Added to favorites!');
    }

    // Show favorites
    public function index()
    {
        $favorites = Favorite::with('product')->where('user_id', Auth::id())->get();
        return view('website.product.wishlist', compact('favorites'));
    }

    // Remove from favorites
    public function remove($id)
    {
        Favorite::where('id', $id)->where('user_id', Auth::id())->delete();
        return back()->with('msg', 'Removed from favorites!');
    }
    
public function toggle($productId)
{
    $userId = auth()->id();

    $favorite = Favorite::where('user_id', $userId)
                ->where('proudect_id', $productId)
                ->first();

    if ($favorite) {
        $favorite->delete();
        return back()->with('msg', 'Removed from favorites');
    }

    Favorite::create([
        'user_id' => $userId,
        'proudect_id' => $productId,
    ]);

    return back()->with('msg', 'Added to favorites');
}

}