<?php

use App\Http\Controllers\BasicController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
/* Route::view('welcome', 'welcome'); */
// Route::get('/', [BasicController::class, 'index']);
// Route::get('/about-us', [BasicController::class, 'aboutUs']);
Route::controller(BasicController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/about-us', 'aboutUs');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        return 'product home';
    });

    Route::get('view', function () {
        return 'View';
    });

    Route::get('detail', function () {
        return 'Detail';
    });
});

Route::get('vendor/{id}/{name}', function ($id, $name) {
    return "Vendor id is {$id} {$name}";
});

Route::get('user/{name?}', function ($name = 'no user') {
    return "User is {$name}";
});

Route::get('products', function () {
    $name = 'Product 1';
    $price = 700;

    /* return view('products.index')->with('name', $name)->with('price', $price); */
    /* return view('products.index', compact('name', 'price')); */
    return view('products.index', ['name' => $name, 'price' => $price]);
});

Route::fallback(function () {
    return 'Are you lost?';
});
