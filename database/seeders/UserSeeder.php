<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            Arr::except(User::factory()->raw(['name' => 'Test User']), ['email'])
        );

        /* User::firstOrCreate( */
        /*     ['email' => 'test@example.com'], */
        /*     User::factory()->raw([ */
        /*         'name' => 'Test User', */
        /*         'email' => 'test@example.com', */
        /*     ]) */
        /* ); */
    }
}
