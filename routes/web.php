<?php

use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm'])->name('register')->middleware('auth');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->middleware('auth')->middleware('auth');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::prefix('products')->group(function () {

    Route::get('/home', [App\Http\Controllers\ProductsController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/show/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('show')->middleware('auth');

    Route::get('/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('edit')->middleware('auth');

    Route::get('/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('create')->middleware('auth');

    Route::post('/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('store')->middleware('auth');

    Route::post('/update', [App\Http\Controllers\ProductsController::class, 'update'])->name('update')->middleware('auth');

    Route::post('/delete', [App\Http\Controllers\ProductsController::class, 'delete'])->name('delete')->middleware('auth');

});
