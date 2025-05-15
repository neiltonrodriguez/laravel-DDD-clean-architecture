<?php

use Illuminate\Support\Facades\Route;
use App\Application\Website\Controllers\UserController;
use App\Application\Website\Controllers\ProductController;

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

// Route::get('/users', function () {
//     return view('welcome');
// });

Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'create']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');