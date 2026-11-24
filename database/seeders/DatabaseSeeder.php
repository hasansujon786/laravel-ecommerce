<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* Category::factory(10)->create(); */
        /* Brand::factory(10)->create(); */

        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
        ]);
        Product::factory(10)->create();
    }
}
