<?php

namespace App\Http\Controllers;
use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout(){
       
       if (Auth::check()) {
        return view('checkout');
       }
       return redirect("login");
    }
    public function history(Orders $order){
       
        if (Auth::check()) {
            $orderss = Orders::orderBy('id','DESC')->paginate(20);
         return view('history',compact('orderss'));
        }
        return redirect("login");
     }
    public function post_checkout(Cart $cart){
        //$auth = auth('web')->user();
        if (Auth::check()) {
            request()->validate([
                'name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'phone' => 'required',
                'order_date'=>'required'
            ]);
            $data = request()->only('name','email','address','phone','order_date');
            $data['user_id']=Auth::user()->id;
            $data['total_amount']=$cart->totalPrice;
            //dd($data);
            if ($order=Orders::create($data)) {
                foreach($cart->items as $cartss){
                    if ($cartss->id!=null) {
                        $data1 = [
                            'order_id' => $order->id,
                            'product_id' => $cartss->id,
                            'quantity' => $cartss->quantity,
                            'price' => $cartss->price,
                        ];
                    }
                    OrderDetails::create($data1);
                }
                $cart->clear();
            }
            return redirect()->route('cart.view')->with('success','đặt hàng thành công');
        }
        
     }
    //  public function detailss(){
    //     $orderss1 = OrderDetails::orderBy('order_id','DESC')->paginate(20);
    //     return $orderss1;
    //  }
    //  public function getTotalPriceAttribute(){
    //     $t = 0;
    //     foreach($this->detailss() as $item){
    //         $t += $item->price * $item->quantity;
    //     }
    //     return $t;
    //  }
}
