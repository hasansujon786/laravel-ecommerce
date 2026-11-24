<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        $regularPrice = fake()->randomFloat(2, 100, 9999);

        return [

            'name' => $name,
            'slug' => Str::slug($name).'-'.fake()->unique()->numberBetween(1000, 99999),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-####-???')),

            'regular_price' => $regularPrice,
            'sale_price' => $regularPrice,

            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'stock_status' => $this->faker->randomElement(['instock', 'outofstock']),
            'status' => $this->faker->randomElement(['draft', 'published']),

            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),

            'brand_id' => Brand::inRandomOrder()->value('id') ?? Brand::factory(),
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'created_by' => User::inRandomOrder()->value('id') ?? User::factory(),
        ];
    }
}
