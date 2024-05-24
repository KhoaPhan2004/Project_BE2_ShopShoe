<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Brands;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

use App\Models\Customer;
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
    Route::get('/product/{id}', [HomeController::class, 'show'])->name('home.show');
    Route::get('/brand/{id}', [HomeController::class, 'productsByBrand'])->name('brand.products');
  
    
});
Route::get('/search', [SearchController::class, 'search']);

  //comments
  Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
  Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
  Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comment.update');
  Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'check_login']);


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'check_register']);


// logout
Route::get('/logout', [HomeController::class, 'singOutUser'])->name('logout');

//cart
Route::group(['prefix' => 'cart', 'middleware' => 'customer'], function () {
    Route::get('/', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
    Route::get('/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

Route::group(['prefix' => 'order', 'middleware' => 'customer'], function () {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
    Route::post('/checkout', [CheckoutController::class, 'post_checkout']);
});


Route::get('/filter-statistics', [StatisticController::class, 'filter']);

//login của admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
//singout
Route::get('admin/sing-out', [AdminController::class, 'singOut'])->name('admin.singout');

Route::get('admin/error', [AdminController::class, 'error'])->name('admin.error');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    //này là routes sort mới nhá
    Route::get('products/sort/{order}', [ProductController::class, 'sort'])->name('products.sort');



    Route::get('admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');

    Route::resources([
        'brand' => BrandController::class,
        'origin' => OriginController::class,
        'product' => ProductController::class,
        'role' => RoleController::class,
        'user' => UserController::class,

    ]);
});
