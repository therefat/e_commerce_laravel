<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'locale'],function(){

Route::get('/',[FrontendHomeController::class,'home'])->name('home');
Route::get('/change-lang/{locale}', [FrontendHomeController::class, 'changeLang'])->name('change.lang');
Route::get('/search-product',[FrontendHomeController::class,'search'])->name('product.search');
Route::get('/registration',[CustomController::class,'registration'])->name('customer.registration');
Route::post('/registration',[CustomController::class, 'store'])->name('customer.store');
Route::get('/login',[CustomController::class, 'login'])->name('customer.login');
Route::post('/login',[CustomController::class,'doLogin'])->name('customer.do.login');
Route::get('/single-product/{id}',[FrontendProductController::class,'singleProductView'])->name('single.product');
Route::get('/product-under-cagtegory/{cat_id}',[FrontendHomeController::class,'productsUnderCategory'])->name('products.under.category');

//cart routes here
Route::get('/cart-view',[CartController::class,'viewCart'])->name('cart.view');
Route::get('/add-to-cart/{product_id}',[CartController::class,'addToCart'])->name('add.toCart');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile', [CustomController::class, 'profile'])->name('profile.view');
    Route::get('/logout',[CustomController::class, 'logout'])->name('customer.logout');
    Route::get('/buy-now/{product_id}',[OrderController::class,'buyNow'])->name('buy.now');
    Route::get('/cancel-order/{product_id}',[OrderController::class,'cancelOrder'])->name('order.cancel');

    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

    Route::post('/order-place',[OrderController::class, 'orderPlace'])->name('order.place');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('/admin/login',[UserController::class,'loginForm'])->name('login');
Route::post('/login-form-post',[UserController::class,'loginPost'])->name('admin.login.post');

Route::group(['middleware'=>'auth'],function(){
Route::group(['middleware'=>'checkAdmin'],function(){


Route::get('/admin/logout',[UserController::class,'logout'])->name('admin.logout');
Route::get('/',[HomeController::class,'home'])->name('dashboard');
Route::get('/users',[UserController::class, 'list'])->name('users.list');
    Route::get('/users/create',[UserController::class, 'createForm'])->name('users.create');

Route::post('/users/store',[UserController::class, 'store'])->name('users.store');
Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/form',[CategoryController::class,"createForm"])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/brand/list',[BrandController::class,'list'])->name('brand.list');
Route::get('/brand/form',[BrandController::class,'createForm'])->name('brand.create');
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/create',[ProductController::class,'createForm'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/update/{id}',[ProductController::class, 'update'])->name('product.update');
  //roles
  Route::get('/roles/list', [RoleController::class, 'list'])->name('roles.list');
  Route::get('/roles/form', [RoleController::class, 'createForm'])->name('roles.form');
  Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
  Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
  Route::post('/roles/edit/{id}', [RoleController::class, 'update'])->name('roles.edit');
  Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
});
});
});
});







