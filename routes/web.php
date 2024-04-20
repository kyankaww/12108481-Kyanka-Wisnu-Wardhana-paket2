<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['isLogin', 'cekRole:admin'])->group(function(){
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::patch('/user/update', [UserController::class, 'update']);
    Route::get('/user/delete/{id}', [UserController::class, 'delete']);

    Route::post('/product/store', [ProductController::class, 'store']);
    Route::patch('/product/update', [ProductController::class, 'update']);
    Route::patch('/product/stock', [ProductController::class, 'stock']);
    Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
});

Route::middleware(['isLogin', 'cekRole:employee'])->group(function(){
    Route::get('/sale', [SaleController::class, 'index']);
    Route::post('/sale/store', [SaleController::class, 'store']);
    Route::get('/sale/detail/{id}', [SaleController::class, 'detail']);
    Route::get('/invoice/{id}', [SaleController::class, 'invoice']);
});

Route::middleware(['isGuest'])->group(function(){
    Route::get('/login', [UserController::class, 'login']);
    Route::post('/auth', [UserController::class, 'auth']);
});

Route::middleware(['isLogin', 'cekRole:employee,admin'])->group(function(){
    Route::get('/', [Controller::class, 'index']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/logout', [UserController::class, 'logout']);
});

