<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/recharge', RechargeController::class);

Route::resource('/products', ProductController::class);
Route::resource('/cards', CardController::class);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/autors', AutorController::class);
    Route::resource('/promotions', PromotionController::class);
    Route::get('/products', [AdminController::class, 'adminShowAllProduct'])->name('admin.product.index');
    Route::get('/products/comments', [AdminController::class, 'adminGetAllComments'])->name('admin.comment.index');
    Route::delete('/products/delete/{id}', [AdminController::class, 'adminDeleteProduct'])->name('admin.product.delete');
    Route::delete('/products/comments/{id}', [AdminController::class, 'adminDeleteComment'])->name('admin.comment.delete');
}); 


Route::post('/products/{id}', [CommentController::class, 'addComment']);
//Route::get('/admin/home', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('admin.home')->middleware('isAdmin');


Route::get('/client/home', [App\Http\Controllers\HomeController::class, 'index'])->name('client.home')->middleware('auth');
