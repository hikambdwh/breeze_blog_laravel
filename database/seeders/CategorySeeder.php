<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['category_name' => 'Action', 'color' => 'bg-red-200']);
        Category::create(['category_name' => 'Fantasy', 'color' => 'bg-blue-200']);
        Category::create(['category_name' => 'Romance', 'color' => 'bg-yellow-200']);
        Category::create(['category_name' => 'Horror', 'color' => 'bg-purple-200']);
        Category::create(['category_name' => 'Pendidikan', 'color' => 'bg-green-200']);
    }
}
