<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart as CartItem; // تأكد من اسم الموديل
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $quantity = 1;
    public $inCart = false;
    public $proudect; // المنتج اللي جاي من الفيو

    public function mount($proudect)
    {
        $this->proudect = $proudect;
        // تحقق هل المنتج موجود في الكارت
        $this->inCart = CartItem::where('user_id', Auth::id())
                                ->where('proudect_id', $this->proudect->id)
                                ->exists();
    }

    public function toggleCart()
    {
        if ($this->inCart) {
            CartItem::where('user_id', Auth::id())
                    ->where('proudect_id', $this->proudect->id)
                    ->delete();
            $this->inCart = false;
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'proudect_id' => $this->proudect->id,
                'quantity' => $this->quantity,
            ]);
            $this->inCart = true;
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
