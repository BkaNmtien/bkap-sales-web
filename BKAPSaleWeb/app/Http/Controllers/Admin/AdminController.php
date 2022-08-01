<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use Auth;


class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function login(){
        return view('admin.login');
    }

    public function postLogin(LoginAdminRequest $request){
        // Kiểm tra đăng nhập
        if(Auth::attempt(['email' =>$request->email, 'password' =>$request->password])){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with('message','Tài khoản hoặc mật khẩu không đúng!')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
