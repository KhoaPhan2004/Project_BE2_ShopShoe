<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $appends =['totalPrice'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'address',
        'phone',
        'status',
        'order_date',
        'total_amount',
        

    ];
    // public function details(){
    //     return $this->hasMany(OrderDetails::class,'order_id','id');
    // }
    // public function getTotalPriceAttribute(){
    //     $t = 0;
    //     foreach($this->detailss as $item){
    //         $t += $item->price * $item->quantity;
    //     }
    //     return $t;
    //  }

   
}