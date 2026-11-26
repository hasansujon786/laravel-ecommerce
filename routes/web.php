<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    /* Route::get('categories/add', 'add'); */
    /* Route::get('categories/{id}', 'show'); */
    /* Route::get('categories/{id}/edit', 'update'); */
    /* Route::get('categories/{id}/del', 'delete'); */
    Route::get('categories/store', 'store');
    Route::get('categories/all', 'asdf');
    Route::get('categories/all', [CategoryController::class, 'asdfsdfsdf']);
});

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
