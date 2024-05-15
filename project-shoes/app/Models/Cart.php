<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();;
        $this->totalQuantity = $this->getTotalQuantity();;
    }


    public function add($product)
    {
        if(isset($this->items[$product->id])){
            $this->items[$product->id]->quantity +=1;
        }else{
            $cart_item = (object)[
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => 1
            ];
            $this->items[$product->id] = $cart_item;
        }
        
        session(['cart' => $this->items]);
    }
    public function update($id,$qtt)
    {
        if(isset($this->items[$id])){
            if ($qtt!=0) {
                $this->items[$id]->quantity=$qtt;
            }
            
        }
    }
    public function delete($id)
    {
        if(isset($this->items[$id])){
            unset($this->items[$id]);
            session(['cart'=>$this->items]);
        }
    }
    public function clear()
    {
        session(['cart'=>null]);
    }
    public function getTotalPrice(){
        $total = 0;
        foreach($this->items as $items){
            $total += $items->quantity * $items->price;
        }
        return $total;
    }
    public function getTotalQuantity(){
        $total = 0;
        foreach($this->items as $items){
            $total += $items->quantity;
        }
        return $total;
    }
}
