<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
     protected $fillable = ['cart_id', 'proudect_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function proudect()
    {
        return $this->belongsTo(Proudect::class);
    }
}
