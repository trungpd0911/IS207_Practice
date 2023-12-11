<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// auth routes defined by laravel


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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// guard 
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('/product')->group(function () {
        Route::get('/create', [
            App\Http\Controllers\ProductController::class, 'create'
        ])->name('product.create');

        Route::post('/store', [
            App\Http\Controllers\ProductController::class, 'store'
        ])->name('product.store');

        Route::get('/edit/{id}', [
            App\Http\Controllers\ProductController::class, 'edit'
        ])->name('product.edit');

        Route::put('/update/{id}', [
            App\Http\Controllers\ProductController::class, 'update'
        ])->name('product.update');

        Route::get('/manage', [
            App\Http\Controllers\ProductController::class, 'manage'
        ])->name('product.manage');

        Route::delete('/delete/{id}', [
            App\Http\Controllers\ProductController::class, 'destroy'
        ])->name('product.delete');
    });
});

Route::prefix('/product')->group(function () {
    Route::get('/', [
        App\Http\Controllers\ProductController::class, 'index'
    ])->name('product.index');

    Route::post('/search', [
        App\Http\Controllers\ProductController::class, 'search'
    ])->name('product.search');
});
