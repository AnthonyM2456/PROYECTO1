<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\NotificationController;

Auth::routes();

Route::get('/', [ProductController::class, 'welcome'])->name('home');
Route::get('/products', function () {
    return view('products.index'); 
})->name('products.index')->middleware('auth');

Route::get('/products/category/{id}', [ProductController::class, 'indexCat'])->name('product.cat');
Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');

Route::get('/compra', [CartController::class, 'compra'])->name('cart.compra');
Route::post('/regalar', [CartController::class, 'regalar'])->name('cart.regalar');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


Route::resource('/recharge', RechargeController::class);
Route::resource('/userproduct', UserProductController::class);
Route::resource('/products', ProductController::class);
Route::resource('/cards', CardController::class);
Route::resource('/notifications', NotificationController::class);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/autors', AutorController::class);
    Route::resource('/promotions', PromotionController::class);
    Route::get('/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
    Route::get('/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
    Route::delete('/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
    Route::delete('/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
}); 


Route::post('/products/{id}', [CommentController::class, 'addComment']);
//Route::get('/admin/home', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('admin.home')->middleware('isAdmin');


Route::get('/client/home', [App\Http\Controllers\HomeController::class, 'index'])->name('client.home')->middleware('auth');
