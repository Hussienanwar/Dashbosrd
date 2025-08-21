<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'total', 'status'];

    // العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع أوردر آيتمز
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // العلاقة مع المنتجات مباشرة (عبر OrderItem)
    public function products()
    {
        return $this->hasManyThrough(
            Proudect::class,   // الموديل النهائي
            OrderItem::class,  // الموديل الوسيط
            'order_id',        // مفتاح Foreign على OrderItem
            'id',              // المفتاح الأساسي في Proudect
            'id',              // المفتاح الأساسي في Order
            'proudect_id'      // مفتاح Foreign على OrderItem يشير للمنتج
        );
    }
    public function proudect()
{
    return $this->belongsTo(Proudect::class, 'proudect_id');
}
}
