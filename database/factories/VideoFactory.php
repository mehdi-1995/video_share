<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'slug' => fake()->slug(),
            'thumbnail' => "https://loremflickr.com/446/240/world?" . rand(1, 999),
            'path' => 'thumbnail',
            'duration' => fake()->time(),
            'description' => fake()->realText(),
            'user_id' => User::first() ?? User::factory(),
            'category_id' => Category::first() ?? Category::factory(),
        ];
    }
}
