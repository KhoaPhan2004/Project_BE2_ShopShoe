<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;

use App\Models\Brands;

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





Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});


Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'check_login']);


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'check_register']);

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/order/{id}', [OrderController::class, 'showOrderDetails']);

Route::get('/order/{userId}', [OrderController::class, 'showOrderDetails']);
Route::post('/order/{orderId}/edit', [OrderController::class, 'editOrder']);
Route::post('/order/{orderId}/delete', [OrderController::class, 'deleteOrder']);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');


    Route::resources([
         'brand' => BrandController::class,
         'origin' => OriginController::class,
        'product' => ProductController::class,
        'order' => OrderController::class,

    ]);
});
