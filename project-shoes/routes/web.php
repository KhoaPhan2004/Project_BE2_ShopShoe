<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\ProductController;
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


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::get('/admin/changePassword', [AdminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('/admin/changePassword', [AdminController::class, 'check_changePassword']);


Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'check_register']);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');


    Route::resources([
         'brand' => BrandController::class,
         'origin' => OriginController::class,
        'product' => ProductController::class,

    ]);
});
