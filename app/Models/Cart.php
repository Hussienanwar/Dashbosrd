<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'proudect_id',
        'quantity'
    ];

    // العلاقة مع الموديل proudect
    public function proudect()
    {
        return $this->belongsTo(proudect::class, 'proudect_id');
    }
}
