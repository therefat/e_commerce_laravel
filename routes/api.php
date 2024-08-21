<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//all products 
Route::get('/all/products',[ProductController::class,'allProducts']);

//single product
Route::get('/single/product/{id}',[ProductController::class,'singleProduct']);

//customer registration
Route::post('/customer/registration',[ProductController::class, 'registration']);
