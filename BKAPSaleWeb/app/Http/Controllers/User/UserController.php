<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        //lay tham so tu the a de dieu huong ve trang checkout
        if(request()->page){
            $paramCheckout = request()->page;
            return view('user.account', compact('paramCheckout'));
        }
        return view('user.account');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ],
        [
            'name.required'=>'Bạn vui lòng nhập tên.',
            'email.required'=>'Bạn vui lòng nhập email.',
            'email.unique'=>'Email '.$request->email.' đã tồn tại.',
            'password.required' => 'Bạn vui lòng nhập mật khẩu.'
        ]);  
        
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'phone'=>$request->phone
        ]);

        if($user){
            return redirect()->back();
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ],
        [
            'email.required'=>'Bạn vui lòng nhập email.',
            'password.required' => 'Bạn vui lòng nhập mật khẩu.'
        ]); 
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if($request->paramCheckout){
                return redirect()->route('checkout.index');
            }else{
                return redirect()->route('home.index');
            }
        }else{
            return redirect()->back()->with('s','Sai tên tài khoản hoặc mật khẩu.');
        }
           
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.index');
    }
}
