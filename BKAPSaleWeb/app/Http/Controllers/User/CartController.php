<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helper\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = new Cart;
        // dd($cart->content());
        $totalPrice = $cart->getTotalPrice();
        $totalQuantityCart = $cart->getTotalQuantityCart();
        return view('user.cart', compact('cart','totalPrice','totalQuantityCart'));
        
    }
    public function add(Request $request){
        $product = Product::find($request->id);
        $cart = new Cart();
        $cart->add($product, $request->quantity_cart, $request->size);
        return redirect()->route('cart.index');
    }
    public function update(Request $request){
        
        $cart = new Cart();
        $cart->update($request->id,$request->quantity_cart, $request->size);

        return redirect()->route('cart.index');
    }
    
    public function delete($id, $size){
        $cart = new Cart();
        $cart->delete($id, $size);
        return redirect()->route('cart.index');

    }
}
