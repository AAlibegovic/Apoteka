<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\QueryController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () { return view('dashboard');})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('products', [ProductController::class, 'index'])->name('products');
Route::middleware(['auth:sanctum', 'verified'])->get('add_product', [ProductController::class, 'create'])->name('add_product');
Route::middleware(['auth:sanctum', 'verified'])->post('store_product', [ProductController::class, 'store'])->name('store_product');
Route::middleware(['auth:sanctum', 'verified'])->post('destroy_product', [ProductController::class, 'destroy'])->name('destroy_product');
Route::middleware(['auth:sanctum', 'verified'])->post('edit_product', [ProductController::class, 'edit'])->name('edit_product');
Route::middleware(['auth:sanctum', 'verified'])->post('update_product', [ProductController::class, 'update'])->name('update_product');

Route::middleware(['auth:sanctum', 'verified'])->get('/brands', [BrandController::class, 'index'])->name('brands');
Route::middleware(['auth:sanctum', 'verified'])->get('queries', [QueryController::class, 'index'])->name('queries');

Route::middleware(['auth:sanctum', 'verified'])->get('sales', [SaleController::class, 'index'])->name('sales');
Route::middleware(['auth:sanctum', 'verified'])->get('add_sale', [SaleController::class, 'create'])->name('add_sale');
Route::middleware(['auth:sanctum', 'verified'])->post('store_sale', [SaleController::class, 'store'])->name('store_sale');
Route::middleware(['auth:sanctum', 'verified'])->post('destroy_sale', [SaleController::class, 'destroy'])->name('destroy_sale');
Route::middleware(['auth:sanctum', 'verified'])->get('edit_sale', [SaleController::class, 'edit'])->name('edit_sale');
Route::middleware(['auth:sanctum', 'verified'])->post('update_sale', [SaleController::class, 'update'])->name('update_sale');

