<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $likeable = $this->likeable();
        return [
            'user_id' => User::first() ?? User::factory(),
            'vote' => fake()->randomElement([1, -1]),
            'likeable_id' => $likeable::factory(),
            'likeable_type' => $likeable,
        ];

        /* --------create--many--like--for--video--7-------------------------------------------------- */

        // return [
        //     'user_id' => User::first() ?? User::factory(),
        //     'vote' => fake()->randomElement([1, -1]),
        //     'likeable_id' => 7,
        //     'likeable_type' => Video::class,
        // ];
    }
    public function likeable()
    {
        return $this->faker->randomElement([
            Video::class,
            Comment::class
        ]);
    }
}
