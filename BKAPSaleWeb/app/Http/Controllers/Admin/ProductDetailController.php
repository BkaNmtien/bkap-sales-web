<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_id = request()->id;
        $product = Product::find($product_id);
        return view('admin.product-detail.add', compact('product_id', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'images.required'=>'Bạn cần thêm ảnh',
            'images.image'=>'Đây không phải là ảnh'
        ]);   
        if($request->hasFile('images')){
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            
        };
        $product_detail = ProductDetail::create([
            'product_id' => $request->product_id,
            'images' => $fileName,
        ]);
        if($product_detail){
            $file->move(public_path('uploads/product-detail'),$fileName);
            return redirect()->route('product-detail.show',$request->product_id)->with('s', 'Thêm mới thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_detail = ProductDetail::where('product_id',$id)->get();
        // dd($product_detail);
        $product = Product::all();
        return view('admin.product-detail.index', compact(['product_detail','product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all();
        $product_detail = ProductDetail::find($id);
        return view('admin.product-detail.edit', compact(['product_detail','product']));
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
        $request->validate([
           
            'images' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'images.image'=>'Đây không phải là ảnh'
        ]);
        $product_detail = ProductDetail::find($id);
        if($request->hasFile('images')){
            $file = $request->file('images');
            $fileName =  $file->getClientOriginalName();       
        }else{
            $fileName = $product_detail->images;
        }
        // thêm thuộc tính image vào $req
        $request->merge(['images'=>$fileName]);      
        $product_detail->update([
                'images'=>$fileName,
            ]);
        if($product_detail){
            if(isset($file)){
                $file->move(public_path('uploads/product-detail'),$fileName);
            };
            return redirect()->route('product-detail.show',$product_detail->product_id)->with('s', 'Cập nhật thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_detail = ProductDetail::find($id);
        
        if($product_detail){
            unlink("uploads/product-detail/".$product_detail->images);
            $product_detail->delete();
            return redirect()->route('product-detail.show',$product_detail->product_id)->with('s', 'Xoá thành công!');
        }
    }
}
