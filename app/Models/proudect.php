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
        // 'image',
        'category_id'
    ];




}

