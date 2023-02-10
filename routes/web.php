<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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


// Route::get('/', [ProductController::class, 'welcome'])->name('products.index');

Route::get('/order/index', [OrderController::class, 'index'])->name('orders.index');


Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::put('/order/update', [OrderController::class, 'update'])->name('orders.update');

Route::resource('orders', OrderController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [ProductController::class, 'welcome'])->name('welcome');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::get('/admin/all', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/create', [ProductController::class, 'create'])->name('create');
    Route::post('/admin/store', [ProductController::class, 'store'])->name('addProduct');
    Route::get('admin/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

    Route::get('admin/edit/{id}', [ProductController::class, 'edit'])->name('admin.edit');

    Route::post('admin/update/{id}', [ProductController::class, 'update'])->name('product.update');

    // search AJAX
    Route::get('product/search', [ProductController::class, 'search'])->name('products.search');

Route::resource('products', ProductController::class);



});
