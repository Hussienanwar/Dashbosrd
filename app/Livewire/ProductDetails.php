<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Favorite;
use Livewire\Component;

class ProductDetails extends Component
{




    public $proudect;
    public $quantity = 1;
    public $inCart;
    public $isFavorite;

    public function increaseQuantity()
    {
        $this->quantity++;
    }
    
    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function mount($proudect)
    {
        $this->proudect = $proudect;
        $this->inCart = Cart::where('user_id', auth()->id())
                        ->where('proudect_id', $proudect->id)
                        ->exists();
        $this->isFavorite = Favorite::where('user_id', auth()->id())
                        ->where('proudect_id', $proudect->id)
                        ->exists();
    }

    public function toggleCart()
    {
        if ($this->inCart) {
            Cart::where('user_id', auth()->id())
                ->where('proudect_id', $this->proudect->id)
                ->delete();
            $this->inCart = false;
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'proudect_id' => $this->proudect->id,
                'quantity' => $this->quantity,
            ]);
            $this->inCart = true;
        }
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            Favorite::where('user_id', auth()->id())
                ->where('proudect_id', $this->proudect->id)
                ->delete();
            $this->isFavorite = false;
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'proudect_id' => $this->proudect->id,
            ]);
            $this->isFavorite = true;
        }
    }
    public function render()
    {
        return view('livewire.product-details');
    }
}
