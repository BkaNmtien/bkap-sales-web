<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\ProductDetail;
use App\Models\OrderDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.add', compact(['category', 'brand']));
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        
        // upload file 
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName =  $file->getClientOriginalName();
           
        }
        
        
        // dd("$fileName");
        // thêm thuộc tính image vào $req
        $request->merge(['image'=>$fileName]);
        // dd($request->all());
        $product = Product::create([
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'brand_id'=>$request->brand_id,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'sale_price'=>$request->sale_price,
                'image'=>$fileName,
                'status'=>$request->status,
                'description'=>$request->description,
            ]);
        if($product){
            $file->move(public_path('uploads/product'),$fileName);

            if($request->hasFile('images')){
                $files = $request->file('images');
                
                foreach($files as $key=>$value){
                    $fileNames = $value->getClientOriginalName();
                    ProductDetail::create([
                        'product_id'=>$product->id,
                        'images'=>$fileNames
                    ]);
                    $value->move(public_path('uploads/product-detail'),$fileNames);

                }
            }

            return redirect()->route('product.index')->with('s', 'Thêm mới thành công!');

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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $brand = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact(['product','category','brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
       
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName =  $file->getClientOriginalName();       
        }else{
            $fileName = $product->image;
        }
        // thêm thuộc tính image vào $req
        $request->merge(['image'=>$fileName]);      
        $product->update([
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'brand_id'=>$request->brand_id,
                'quantity'=>$request->quantity,
                'price'=>$request->price,
                'sale_price'=>$request->sale_price,
                'image'=>$fileName,
                'status'=>$request->status,
                'description'=>$request->description,
            ]);
        if($product){
            if(isset($file)){
                $file->move(public_path('uploads/product'),$fileName);
            };
            
            return redirect()->route('product.index')->with('s', 'Cập nhật thành công!');
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
        ProductDetail::where('product_id',$id)->delete();
        OrderDetail::where('product_id',$id)->delete();
        $product = Product::find($id);

        if($product){
            unlink("uploads/product/".$product->image);
            $product->delete();
            return redirect()->route('product.index')->with('s', 'Xoá thành công!');
        }
    }
}
