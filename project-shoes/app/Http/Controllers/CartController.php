<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;


class CartController extends Controller
{
    public function addToCart(Product $product,Cart $cart){
        $cart->add($product);
        
        return redirect()->route('cart.view')->with('success','thêm sản phẩm vào giỏ hàng thành công');
    }

    public function view(Cart $cart){
       
        return view('cart-view',compact('cart'));
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
