<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);
Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/form',[CategoryController::class,"createForm"])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/brand/list',[BrandController::class,'list']);
Route::get('/brand/form',[BrandController::class,'createForm'])->name('brand.create');
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/create',[ProductController::class,'createForm'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');


