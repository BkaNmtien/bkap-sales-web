<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;


class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user-admin.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Thay đổi phân quyền người dùng
        $user = User::find($id);
        $user->update([
            'level' => $request->level
        ]);

        return redirect()->route('user-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Xoá người dùng
        $checkOrder = Order::where('user_id',$id)->pluck('id')->toArray();
        $user = User::find($id);
        if($checkOrder==[]){
            if($user->level == 0){
                Order::where('user_id',$id)->delete();
                $user->delete();

                return redirect()->route('user-admin.index');
            }else{
                return redirect()->route('user-admin.index')->with('err', 'Không thể xoá!
                Người dùng '.$user->name.' cũng là Admin.');
            }
        }else{
            return redirect()->route('user-admin.index')->with('err', 'Không thể xoá!
            Người dùng '.$user->name.' đang có đơn hàng.');
        }
        
    }
}
