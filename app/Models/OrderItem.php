<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'proudect_id', 'quantity', 'price'];

    // العلاقة مع المنتج
    public function proudect()
    {
        return $this->belongsTo(Proudect::class, 'proudect_id');
    }

    // العلاقة مع الأوردر
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
