<?php

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
Route::middleware(['auth','admin'])->group(function() {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
    Route::post('/admin/product/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProduct']);
    Route::post('/admin/user/block/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser']);
});

Route::middleware(['auth', 'blocked'])->group(function() {
    Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create']);

    Route::post('/product/delete', [\App\Http\Controllers\ProductController::class, 'delete']);
    Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store']);

    Route::get('/account', [\App\Http\Controllers\AccountController::class, 'show']);
    Route::get('/account/review', [\App\Http\Controllers\ReviewController::class, 'show']);
    Route::get('/account/review/create/{id}', [\App\Http\Controllers\ReviewController::class, 'create']);
    Route::post('/account/review/create', [\App\Http\Controllers\ReviewController::class, 'store']);
    Route::post('/product/agreement/create', [\App\Http\Controllers\AccountController::class, 'create']);
    Route::post('/product/agreement/update', [\App\Http\Controllers\AccountController::class, 'update']);
});

Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

Route::get('/', [\App\Http\Controllers\ProductController::class, 'random']);

Route::get('/blocked', function () {
    return view('account.blocked');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
