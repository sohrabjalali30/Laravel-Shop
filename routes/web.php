<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/my_orders',[HomeController::class,'my_orders'])->middleware(['auth','verified']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('view_category' ,[AdminController::class, 'view_category'])->middleware(['auth', 'admin']);
Route::post('add_category' ,[AdminController::class, 'add_category'])->middleware(['auth', 'admin']);
Route::get('delete_category/{id}' ,[AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);
Route::get('edit_category/{id}' ,[AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);
Route::post('update_category/{id}' ,[AdminController::class, 'update_category'])->middleware(['auth', 'admin']);
Route::get('new_product' ,[AdminController::class, 'new_product'])->middleware(['auth', 'admin']);
Route::post('upload_product' ,[AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);
Route::get('all_products',[AdminController::class,'all_products'])->middleware('auth','admin');
Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware('auth','admin');
Route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware('auth','admin');
Route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware('auth','admin');
Route::get('product_search',[AdminController::class,'product_search'])->middleware('auth','admin');
Route::get('view_orders',[AdminController::class,'view_orders'])->middleware('auth','admin');
Route::get('on_way/{id}',[AdminController::class,'on_way'])->middleware('auth','admin');
Route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware('auth','admin');
Route::get('print_order/{id}',[AdminController::class,'print_order'])->middleware('auth','admin');



Route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('shop',[HomeController::class,'shop']);
Route::get('search',[HomeController::class,'search']);
Route::get('product/{id}',[HomeController::class,'product']);
Route::get('contact',[HomeController::class,'contact']);
Route::get('blog',[HomeController::class,'blog']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::get('shiping_order',[HomeController::class,'shiping_order'])->middleware(['auth', 'verified']);
Route::get('cart_remove/{id}',[HomeController::class,'cart_remove'])->middleware(['auth', 'verified']);
Route::post('shipping',[HomeController::class,'shipping'])->middleware(['auth', 'verified']);
Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});
