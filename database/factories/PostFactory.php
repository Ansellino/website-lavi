<?php

namespace Database\Factories;

use App\Models\Category; // Import your Category model
use App\Models\Post;
use App\Models\User; // Import your User model
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(3, 6)); // Generate a sentence for the title
        return [
            'title' => $title,
            'slug' => Str::slug($title), // Generate slug from title
            'content' => $this->faker->paragraph(rand(5, 10)), // Generate a paragraph for content
            'user_id' => User::inRandomOrder()->first()->id, // Assign a random user (author)
            'price' => $this->faker->randomFloat(2, 0, 1000), // Generate a random price
        ];
    }
}
