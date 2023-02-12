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
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
Route::get('remove-item-cart/{id}', [CartController::class, 'removeItemCart']);
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


Route::get('test-email', [HomeController::class, 'testEmail']);
// verify email khi đăng ký
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// end verify email khi đăng ký


require __DIR__.'/auth.php';