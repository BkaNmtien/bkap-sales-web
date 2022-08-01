<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Helper\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantityCart = $cart->getTotalQuantityCart();
        return view('user.checkout', compact('cart','totalPrice','totalQuantityCart'));
    }

    public function create(OrderRequest $request){
        // dd($request->all());
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantityCart = $cart->getTotalQuantityCart();
        

        $order = Order::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'total_money' => $totalPrice,
            'note' => $request->note,
        ]);

        foreach($cart->content() as $value){
            OrderDetail::create([
                'product_id' => $value['product_id'],
                'order_id' => $order->id,
                'quantity' => $value['quantity_cart'],
                'size' => $value['size'],
                'price' => $value['price'],
                'total_price' => $value['quantity_cart']*$value['price'],
            ]);
        }


        if($order){
            Session::forget('cart');
            return redirect()->route('checkout.thanks');
        }
        
    }
    // Thanks
    public function thanks(){

        return view('user.thanks');
    }

}
