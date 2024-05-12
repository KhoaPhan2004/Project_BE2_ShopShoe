<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details'; // Đặt tên bảng tương ứng với bảng trong cơ sở dữ liệu

    protected $fillable = [ // Định nghĩa các trường có thể gán giá trị
        'order_id',
        'product_id',
        'quantity',
        // Các trường khác nếu có
    ];

    // Định nghĩa các mối quan hệ với các model khác nếu cần thiết
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
