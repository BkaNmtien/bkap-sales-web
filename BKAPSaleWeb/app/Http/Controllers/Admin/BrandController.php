<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\OrderDetail;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
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
            'name' => 'required|unique:brands',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'name.required'=>'Tên không được để rỗng.',
            'name.unique'=>'Tên '.$request->name.' đã tồn tại.',
            'logo.required'=>'Bạn cần thêm ảnh',
            'logo.image'=>'Đây không phải là ảnh'
        ]);   
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            
        };
        $brand = Brand::create([
            'name' => $request->name,
            'logo' => $fileName,
        ]);
        if($brand){
            $file->move(public_path('uploads'),$fileName);
            return redirect()->route('brand.index')->with('s', 'Thêm mới thành công!');
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
       $brand = Brand::find($id);
       return view('admin.brand.edit', compact('brand'));
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
            'name' => 'required|unique:brands,name'.$id,
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'name.required'=>'Tên không được để rỗng.',
            'name.unique'=>'Tên '.$request->name.' đã tồn tại.',
            'logo.required'=>'Bạn cần thêm ảnh',
            'logo.image'=>'Đây không phải là ảnh'
        ]);   
        $brand = Brand::find($id);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
                   
        }else{
            $fileName = $brand->logo;
        };

        $brand->update([
            'name' => $request->name,
            'logo' => $fileName,
        ]);

        if($brand){
            if(isset($file)){
                $file->move(public_path('uploads'),$fileName);
            }
            return redirect()->route('brand.index')->with('s', 'Cập nhật thành công!');
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
        $checkProduct= Product::where('brand_id', $id)->pluck('id')->toArray();
        $brand = Brand::find($id);

        // Dieu kien xoa brand
        if($checkProduct==[]){
            if($brand){
                unlink("uploads/".$brand->logo);
                $brand->delete();
                return redirect()->route('brand.index')->with('s', 'Xoá thành công!');
            }
        }else{
            return redirect()->route('brand.index')->with('err', 'Bạn cần xoá hết sản phẩm có thương
            hiệu '.$brand->name.' trước!');
        }
    }
}
