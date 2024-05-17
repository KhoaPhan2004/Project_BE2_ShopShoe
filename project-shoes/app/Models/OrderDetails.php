<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
     protected $table = 'order_details'; // Đặt tên bảng tương ứng với bảng trong cơ sở dữ liệu
    public $timestamp = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
  
    
}
