<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index', compact('category'));
        return view('admin.product.add', compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function create(Request $req){
        $req->validate([
            'name' => ['required', 'unique:categories'],
            'status' => 'required',
        ],
        [
            'name.required'=>'Tên không được để rỗng.',
            'name.unique'=>$req->name.' đã tồn tại.'
        ]);
        $category = Category::create($req->all());

        if($category){
            return redirect()->route('category.index')->with('s', 'Thêm mới thành công!');
        }

        
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $req, $id){
        $req->validate([
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required',
        ],
        [
            'name.required'=>'Tên không được để rỗng.',
            'name.unique'=>$req->name.' đã tồn tại.'
        ]);
        $category = Category::find($id)->update($req->all());
        if($category){
            return redirect()->route('category.index')->with('s', 'Cập nhật thành công!');
        }
    }
    
    public function delete($id){
        $checkProduct= Product::where('category_id', $id)->pluck('id')->toArray();
        $category = Category::find($id);
        if($checkProduct==[]){
            if($category){
                $category->delete();
                return redirect()->route('category.index')->with('s', 'Xoá thành công!');
            }
        }else{
            return redirect()->route('category.index')->with('err', 'Bạn cần xoá hết sản phẩm thuộc
            danh mục '.$category->name.' trước!');
        }

       
    }
}
