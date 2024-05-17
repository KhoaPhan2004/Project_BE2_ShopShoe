<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'image_url',
        'brand_id',
        'origin_id',
        'size',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
