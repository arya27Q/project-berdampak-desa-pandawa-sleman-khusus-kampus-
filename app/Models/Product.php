<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'desc',
        'price',
        'badge',
        'badgeTone',
        'image_path',
    ];
}
