<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Accessories', 'slug' => 'accessories'],
            ['name' => 'Automotive', 'slug' => 'automotive'],
            ['name' => 'Beauty', 'slug' => 'beauty'],
            ['name' => 'Electronics', 'slug' => 'electronics'],
            ['name' => 'Fashion', 'slug' => 'fashion'],
            ['name' => 'Food', 'slug' => 'food'],
            ['name' => 'Garden', 'slug' => 'garden'],
            ['name' => 'Health', 'slug' => 'health'],
            ['name' => 'Home', 'slug' => 'home'],
            ['name' => 'Instruments', 'slug' => 'instruments'],
            ['name' => 'Jewelry', 'slug' => 'jewelry'],
            ['name' => 'Office', 'slug' => 'office'],
            ['name' => 'Pets', 'slug' => 'pets'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Toys', 'slug' => 'toys'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category, [
                'image' => 'https://picsum.photos/seed/picsum/300/200',
            ]);
        }
    }
}
