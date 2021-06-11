<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get('/', [HomePageController::class, 'homePage'])->name('homePage');

Route::match(['get', 'post'], '/login',[AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/profile', [UserController::class, 'profile'])->name('profile');
Route::match(['get', 'post'],'/register', [AuthController::class, 'register'])->name('register');

Route::match(['get', 'post'],'/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::get('/', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::any('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});


//Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/chernovik', [\App\Http\Controllers\BlogController::class, 'blog'])->name('blog');
Route::get('/category/{category_id}', [ProductController::class, 'category'])->name('category');
Route::get('/product-details/{product_id}', [ProductController::class, 'productDetails'])->name('product.details');
