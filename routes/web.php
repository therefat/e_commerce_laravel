<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home']);
Route::get('/category/list',[CategoryController::class,'list']);
Route::get('/category/form',[CategoryController::class],'createForm');
Route::get('/brand/list',[BrandController::class,'list']);

