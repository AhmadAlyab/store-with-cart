<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// routes for admin
Route::get('/admin',[AdminController::class,'index'])
            ->middleware(['auth', 'verified'])->name('admin');

Route::prefix('/discount')->group(function(){
    Route::post('/create',[DiscountController::class,'store'])->name('discount.add');
    Route::post('/edit',[DiscountController::class,'update'])->name('discount.update');
    Route::delete('/delete',[DiscountController::class,'destroy'])->name('discount.delete');
})->middleware(['auth', 'verified']);

Route::prefix('/product')->group(function(){
    Route::post('/create',[ProductController::class,'store'])->name('product.add');
    Route::post('/edit',[ProductController::class,'update'])->name('product.update');
    Route::delete('/delete',[ProductController::class,'destroy'])->name('product.delete');
})->middleware(['auth', 'verified']);

Route::prefix('/user')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('users.index');
    Route::post('/update',[UserController::class,'update'])->name('user.update');
    Route::delete('/delete',[UserController::class,'delete'])->name('user.delete');
})->middleware(['auth', 'verified']);

Route::prefix('/order')->group(function(){
    Route::get('/',[OrderController::class,'index'])->name('orders.index');
    Route::get('/view/{id}',[OrderController::class,'show'])->name('order.show');
    Route::delete('/delete',[OrderController::class,'destroy'])->name('order.delete');
    Route::delete('/deleteItem',[OrderController::class,'destroyItem'])->name('order.delete.item');
    Route::post('/edit',[OrderController::class,'update'])->name('order.edit');
})->middleware(['auth', 'verified']);

Route::prefix('/setting')->group(function(){
    Route::get('/',[SettingController::class,'index'])->name('setting.index');
    Route::post('/store',[SettingController::class,'store'])->name('setting.store');
})->middleware(['auth', 'verified']);

// routes for customer
Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix('/cart')->group(function(){
    Route::get('/count',[CartController::class,'count'])->name('cart.count');
    Route::post('/add',[CartController::class,'add'])->name('cart.add');
    Route::get('/view',[CartController::class,'view'])->name('cart.view');
    Route::get('/clear',[CartController::class,'clear'])->name('cart.clear');
    Route::get('/remove/{id}',[CartController::class,'removeFromCart'])->name('cart.remove');
    Route::get('/info',[CartController::class,'info'])->name('cart.info');
});

Route::prefix('/order')->group(function(){
    Route::post('/store',[OrderController::class,'store'])->name('order.save');
});

require __DIR__.'/auth.php';
