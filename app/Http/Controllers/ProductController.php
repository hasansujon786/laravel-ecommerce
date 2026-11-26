<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function add()
    {
        /* $item = new Brand; */
        /* $item->name = 'First Brand'; */
        /* $item->slug = 'first_slug'; */
        /* $item->image = 'this is a image'; */
        /* $item->save(); */

        /* $item = Product::create([ */
        /*     'name' => 'First Brand 1', */
        /*     'slug' => 'first_slug', */
        /*     'image' => 'this is a image', */
        /*     "asdfsdf" => "yyyyyyyyyyyyyyy,", */
        /*     "foo" => "yyyyyyyyyyyyyyy,", */
        /*     "moo" => "yyyyyyyyyyyyyyy,", */
        /* ]); */

        /* $product = Product::firstOrCreate([ */
        /*     'name' => 'Wireless Mechanical Keyboard', */
        /*     'slug' => 'wireless-mechanical-keyboard', */
        /*     'regular_price' => 129.99, */
        /*     'sale_price' => 99.99, */
        /*     'sku' => 'WMK-2026-BLK', */
        /*     'stock_quantity' => 55, */
        /*     'stock_status' => 'instock', // Must be 'instock' or 'outofstock' */
        /*     'featured' => 'yes', */
        /*     'short_description' => 'Compact 75% hot-swappable wireless mechanical keyboard with RGB backlight.', */
        /*     'description' => 'Engineered for both macOS and Windows with tri-mode connectivity (Bluetooth 5.1, 2.4GHz wireless, and USB-C wired), tactile switches, and a 4000mAh battery.', */
        /*     'status' => 'published', */
        /*     'brand_id' => 1,    // Must exist in `brands` table */
        /*     'category_id' => 1, // Must exist in `categories` table */
        /*     'created_by' => 1,  // Must exist in `users` table */
        /* ]); */

        $product = Product::updateOrCreate([
            'name' => 'Wireless Mechanical Keyboard asdf',
        ], [
            /* 'name' => 'Wireless Mechanical Keyboard', */
            'slug' => 'wireless-mechanical-keyboard asdf',
            'regular_price' => 129.99,
            'sale_price' => 99.99,
            'sku' => 'WMK-2026-BLK',
            'stock_quantity' => 55,
            'stock_status' => 'instock', // Must be 'instock' or 'outofstock'
            'featured' => 'yes',
            'short_description' => 'Compact 75% hot-swappable wireless mechanical keyboard with RGB backlight.',
            'description' => 'Engineered for both macOS and Windows with tri-mode connectivity (Bluetooth 5.1, 2.4GHz wireless, and USB-C wired), tactile switches, and a 4000mAh battery.',
            'status' => 'published',
            'brand_id' => 1,    // Must exist in `brands` table
            'category_id' => 1, // Must exist in `categories` table
            'created_by' => 1,  // Must exist in `users` table
        ]);

        return $product;
    }

    public function show($id)
    {
        /* $item = Brand::findOrFail(); */
        /* $item = Brand::first(); */
        $item = Product::where('id', $id)->get();
        /* $item = Product::where('status', 'published')->get(); */

        return $item;
    }

    public function published()
    {
        /* $item = Product::where('status', '!=', 'published')->get(); */
        /* $item = Product::where('stock_quantity', '> 50 & < 60', 'published')->get(); */

        $publishedProducts = Product::status('published')->get();

        /* // Chained with other query conditions */
        /* $featuredActive = Product::where('featured', true) */
        /*     ->status('active') */
        /*     ->latest() */
        /*     ->get(); */

        return $publishedProducts;
    }
}
