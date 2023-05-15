<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->has(Product::factory()->count(5))
            ->create();

        Category::factory()
            ->has(Product::factory()->count(5))
            ->create([
                'icon' => 'bus-icon',
            ]);
    }
}
