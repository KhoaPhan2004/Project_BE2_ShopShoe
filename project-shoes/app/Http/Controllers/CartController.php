<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class CartController extends Controller
{
    public function addToCart(Product $product,Cart $cart){
        $cart->add($product);
        
        return redirect()->route('cart.view')->with('success','thêm sản phẩm vào giỏ hàng thành công');
    }

    public function view(Cart $cart){
        $brands = Brand::pluck('brand_name', 'id');

        return view('cart-view',compact('cart','brands'));
       
        
    }
    public function deleteCart($id,Cart $cart){
        $cart->delete($id);
        return redirect()->route('cart.view')->with('warning','xóa sản phẩm khỏi giỏ hàng thành công');
    }

    public function updateCart($id,Cart $cart){
        $quantity = request('quantity',1);
        $cart->update($id,$quantity);
        return redirect()->route('cart.view')->with('success','cập nhật số lượng sản phẩm vào giỏ hàng thành công');
    }
    public function clearCart(Cart $cart){
        $cart->clear();
        return redirect()->route('cart.view')->with('warning','xóa sản phẩm khỏi giỏ hàng thành công');
    }

    

}
