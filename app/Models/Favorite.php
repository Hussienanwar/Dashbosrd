<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
        protected $fillable = ['user_id', 'proudect_id'];

    public function product()
    {
        return $this->belongsTo(proudect::class,'proudect_id');
    }
}
