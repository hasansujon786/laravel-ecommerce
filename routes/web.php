<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);

Route::resource('brands', BrandController::class)->only([
    'index',
    'create',
    'store',
    'edit',
    'update',
    'destroy',
]);

Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('products/add', 'add');
    Route::get('products/pub', 'published');
    Route::get('products/{id}', 'show');
    /* Route::get('brand/{id}/edit', 'update'); */
    /* Route::get('brand/{id}/del', 'delete'); */
    /* Route::get('brand/store', 'store'); */
    /* Route::get('brand/all', 'getAll'); */
});
