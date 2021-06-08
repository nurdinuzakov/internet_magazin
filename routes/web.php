<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('/', [UserController::class, 'homePage'])->name('homePage');

Route::get('/login/form',[AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/register/form', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::match(['get', 'post'],'/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::post('/', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::any('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});


//Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/product-details', [ProductController::class, 'productDetails'])->name('product.details');
