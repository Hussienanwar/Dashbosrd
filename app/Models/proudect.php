<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class proudect extends Model
{
    use SoftDeletes;
    protected $table ="proudect";
        protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id'
    ];


    public function orderItems() {
    return $this->hasMany(OrderItem::class, 'proudect_id');
}

public function reviews() {
    return $this->hasMany(Review::class);
}

public function averageRating()
{
    return $this->reviews()->avg('rating');
}


}

