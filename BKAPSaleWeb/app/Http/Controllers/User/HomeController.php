<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\OrderDetail;

class HomeController extends Controller
{
    public function index(){
        // San pham moi ve
        $product = Product::where('status', 1)->take(10)->get()->sortByDesc('id');
                                                        
        // Top san pham ban chay
        $sortBySale = OrderDetail::pluck('product_id')->toArray();
        $countItem = array_count_values($sortBySale);
        arsort($countItem);
        $item = array_keys($countItem);
        foreach($item as $value){
            $a1 = OrderDetail::where('product_id', $value)->pluck('quantity')->toArray();
            $quanti = 0;
            foreach($a1 as $value1){
                $quanti += $value1;
            }
            $pro[$value]=$quanti;
        }
        arsort($pro);
        $proTake = array_slice( array_keys($pro), 0, 6 );
        foreach($proTake as $value){
            $productTopSale[] = Product::where('id', $value)->get()->toArray();
        }
        

        return view('user.home', compact('product','productTopSale'));
    }

    public function productDetail($id){
        $product = Product::find($id);
        $brand = Brand::all();
        $product_detail = ProductDetail::where('product_id', $id)->pluck('images')->toArray();
        // dd($product_detail);
        return view('user.product-detail', compact(['product', 'brand', 'product_detail']));
    }

    // Tìm kiếm sản phẩm
    public function searchGet(){
        return view('user.classify.product-search');
    }
    public function search(Request $request){
        $key_search = $request->key_search;
        $product = Product::where('name', 'LIKE', "%{$key_search}%")->get();

        return view('user.classify.product-search',compact('product','key_search'));
    }

    //San pham theo danh muc
    public function productCategory($id){
        $nameCategory = Category::find($id);
        $product = Product::where('category_id',$id)->get();
    
        return view('user.classify.product-category',compact('product','nameCategory'));
    }

    // San pham theo gia
    public function sortByPriceGet(){
        return view('user.classify.sort-by-price');
    }
    public function sortByPrice(Request $request){
        $price_start = $request->price_start;
        $price_end = $request->price_end;
        $productCheck = Product::all()->toArray();
        foreach($productCheck as $value){
            if(isset($value['sale_price'])){
                if($value['sale_price'] >= $price_start && $value['sale_price'] <= $price_end ){
                    $product[] = Product::where('sale_price', $value['sale_price'])->get()->toArray();
                }
            }else{
                if($value['price'] >= $price_start && $value['price'] <= $price_end ){
                    $product[] = Product::where('price', $value['price'])->get()->toArray();
                }
            }
        }
        return view('user.classify.sort-by-price',compact('product'));
    }

    //San pham theo danh muc
    public function productBrand($id){
        $product = Product::where('brand_id',$id)->get();
    
        return view('user.classify.product-brand',compact('product'));
    }

}
