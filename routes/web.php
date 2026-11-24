<?php

use App\Http\Controllers\CategoryController;
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
    Route::get('categories/all', 'getAll');
});
