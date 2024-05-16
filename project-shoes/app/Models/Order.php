<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'order_date', 'status', 'address'
    ];
    public function calculateTotalPrice()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->product->price * $detail->quantity;
        }
        return $total;
    }
}
