<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\UserAdminController; 
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('product-detail/{id}', [HomeController::class, 'productDetail'])->name('home.product-detail');
// Tìm kiếm sản phẩm
Route::get('/search-product', [HomeController::class,'searchGet'])->name('product.search-get');
Route::post('/search-product', [HomeController::class,'search'])->name('product.search');
// San pham theo danh muc
Route::get('/sort-by-category/{id}', [HomeController::class,'productCategory'])->name('product.category');
// San pham theo gia
Route::get('/sort-by-price', [HomeController::class,'sortByPriceGet']);
Route::post('/sort-by-price', [HomeController::class,'sortByPrice'])->name('product.sort-by-price');
// San pham theo thuong hieu
Route::get('/sort-by-brand/{id}', [HomeController::class,'productBrand'])->name('product.brand');

//Route account
Route::get('/account', [UserController::class, 'index'])->name('user.index');
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::post('login', [UserController::class, 'login'])->name('user.login');
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

//Route Shop Cart
Route::post('add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('show-cart', [CartController::class, 'index'])->name('cart.index');
Route::post('update-cart', [CartController::class, 'update'])->name('cart.update');
Route::get('delete-cart/{id}/{size}', [CartController::class, 'delete'])->name('cart.delete');

//Route Checkout
Route::get('check-out', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('add-check-out', [CheckoutController::class, 'create'])->name('checkout.add-order');
// Thanks
Route::get('thanks', [CheckOutController::class,'thanks'])->name('checkout.thanks');




//Route trang Admin
Route::middleware('checkAdmin')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('add-category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('edit-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::resource('brand', BrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-detail', ProductDetailController::class);
    Route::resource('order', OrderController::class);
    Route::resource('user-admin', UserAdminController::class);
});

// Route Login Admin
Route::get('login-admin', [AdminController::class,'login'])->name('admin.login');
Route::post('post-login-admin', [AdminController::class,'postLogin'])->name('admin.postLogin'); 
Route::get('logout-admin', [AdminController::class,'logout'])->name('admin.logout'); 



