<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 6), false);

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'author_id' => User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
