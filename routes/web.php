<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);
Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/form',[CategoryController::class,"createForm"]);
Route::get('/brand/list',[BrandController::class,'list']);
Route::get('/brand/form',[BrandController::class,'createForm']);
Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');

