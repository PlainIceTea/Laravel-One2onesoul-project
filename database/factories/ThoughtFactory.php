<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thought>
 */
class ThoughtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()->sentence(),
            'user_id' =>User::inRandomOrder()->first()->id,
            'content'=> fake()->text(),
            'slug' => function (array $attributes) {
                return Str::slug($attributes['title']); // Membuat slug berdasarkan title
            },
            'is_anonymous' => true
        ];
    }
}

