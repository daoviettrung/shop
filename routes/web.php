<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\HomeController;
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
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashBoardController::class, 'index']);
    Route::POST('/cache-clear', [DashBoardController::class, 'cacheClear']);
});
Route::resource('category', CategoryController::class)->middleware(['auth']);
Route::resource('slide', SlideController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
