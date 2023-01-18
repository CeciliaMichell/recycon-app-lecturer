<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LocalizationController;

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


Route::get('/', [ProductController::class, 'home']);
Route::get('/show-product', [ProductController::class, 'show_product']);
Route::get('/detail-product/{id}', [ProductController::class, 'detail_product']);

Route::get('/switch/{lang?}', [LocalizationController::class, 'switchLanguage']);

Route::middleware('Guest')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'registerUser']);
    Route::post('/login', [UserController::class, 'actionLogin']);
});

Route::middleware('LogIn')->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'viewProfile']);
    Route::post('/profile', [UserController::class, 'updateProfile']);
    Route::get('/change-password', [UserController::class, 'viewChangePassword']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::get('/search', [UserController::class, 'logout']);
});

Route::middleware('Customer')->group(function () {
    Route::get('/cart', [CartController::class,'viewCart']);
    Route::post('/cart', [CartController::class,'insertCart']);
    Route::get('/transaction',[TransactionController::class,'viewTransaction']);
    Route::post('/transaction',[TransactionController::class,'insertTransaction']);
    Route::post('/delete-cart',[CartController::class,'deleteCart']);
});

Route::middleware('Admin')->group(function () {
    Route::get('/view-item', [ProductController::class, 'view_item']);
    Route::get('/update-item', [ProductController::class, 'update_item']);
    Route::get('/add-item', [ProductController::class, 'view_add_item']);
    Route::post('/add-item', [ProductController::class, 'add_item']);
    Route::post('/delete-product',[ProductController::class,'delete_product']);
    Route::get('/update-product/{id}',[ProductController::class,'update_product_view']);
    Route::post('/update-product',[ProductController::class,'update_product']);
});





