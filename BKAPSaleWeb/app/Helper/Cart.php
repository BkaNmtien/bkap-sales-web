<?php
namespace App\Helper;
use Illuminate\Support\Facades\Session;
class Cart {
    //thuoc tinh
    private $items = [];
    private $total_amount = 0;
    private $total_price = 0;
    //Phuong thuc
    //Phuong thuc khoi tao
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
    }
    
    public function add($product,$quantity_cart,$size){
        $item = [
            'product_id' => $product->id,
            'product_name' => $product->name,
            'size'=> $size,
            'image'=>$product->image,
            'price'=>$product->sale_price > 0 ? $product->sale_price : $product->price,
            'old_price'=>$product->price,
            'quantity_cart'=>$quantity_cart < 1 ? 1 : $quantity_cart
        ];
        
        if(isset($this->items[$product->id.$size])){
            $this->items[$product->id.$size]['quantity_cart'] += $quantity_cart;
        }else{
            $this->items[$product->id.$size] = $item;
        }
        session(['cart'=>$this->items]);
    }

    public function content(){
        
        return $this->items;
    }
 
    public function update($id, $quantity_cart, $size){
        $quantity_cart = $quantity_cart >0 ? $quantity_cart : 1;
        if(isset($this->items[$id.$size])){
            $this->items[$id.$size]['quantity_cart'] = $quantity_cart;
        };
        session(['cart'=>$this->items]);
    }

    public function getTotalQuantityCart(){
        $totalQuantityCart = 0;
        foreach($this->items as $value){
            $totalQuantityCart += $value['quantity_cart'] ;
        }

        return $totalQuantityCart;
    }

    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $value){
            
            // dd($value['price']);
            $totalPrice += $value['quantity_cart'] * $value['price'] ;
        }

        return $totalPrice;
    }

    public function delete($id, $size){
        if(isset($this->items[$id.$size])){
            unset($this->items[$id.$size]);
        }
        session(['cart'=>$this->items]);
    }
        
}