<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Client\CartController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('categories/{slug}', [HomeController::class, 'searchByCategory']);
Route::post('add-cart', [CartController::class, 'addToCart']);
Route::get('detail-cart', [CartController::class, 'show']);
Route::get('detail-product/{id}', [App\Http\Controllers\Client\ProductController::class, 'viewDetailProduct']);
Route::get('login-facebook/{social}', [SocialController::class, 'getInfor']);
Route::get('check-login-facebook/{social}', [SocialController::class, 'checkInfor']);
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/{slug}', [BlogController::class, 'show']);
});
Route::prefix('dashboard')->middleware(['auth.admin'])->group(function () {
    Route::get('/', [DashBoardController::class, 'index']);
    Route::POST('/cache-clear', [DashBoardController::class, 'cacheClear']);
});
Route::resource('category', CategoryController::class)->middleware(['auth']);
Route::resource('slide', SlideController::class)->middleware(['auth']);
Route::resource('product', ProductController::class)->middleware(['auth']);
Route::resource('post', PostController::class)->middleware(['auth']);

require __DIR__.'/auth.php';