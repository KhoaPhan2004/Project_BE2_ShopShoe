<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details'; // Đặt tên bảng tương ứng với bảng trong cơ sở dữ liệu

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    // Định nghĩa các mối quan hệ với các model khác nếu cần thiết
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
   

}
