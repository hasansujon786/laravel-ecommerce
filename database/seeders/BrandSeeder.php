<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Adidas', 'slug' => 'adidas'],
            ['name' => 'Apple', 'slug' => 'apple'],
            ['name' => 'Asus', 'slug' => 'asus'],
            ['name' => 'Canon', 'slug' => 'canon'],
            ['name' => 'Dell', 'slug' => 'dell'],
            ['name' => 'HP', 'slug' => 'hp'],
            ['name' => 'IKEA', 'slug' => 'ikea'],
            ['name' => 'Lenovo', 'slug' => 'lenovo'],
            ['name' => 'LG', 'slug' => 'lg'],
            ['name' => 'Logitech', 'slug' => 'logitech'],
            ['name' => 'Nike', 'slug' => 'nike'],
            ['name' => 'Puma', 'slug' => 'puma'],
            ['name' => 'Samsung', 'slug' => 'samsung'],
            ['name' => 'Sony', 'slug' => 'sony'],
            ['name' => 'Zara', 'slug' => 'zara'],
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate($brand, [
                'image' => 'https://picsum.photos/seed/picsum/300/200',
            ]);
        }
    }
}
