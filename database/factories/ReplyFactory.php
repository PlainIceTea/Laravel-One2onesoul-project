<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Thought;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>User::inRandomOrder()->first()->id,
            'thought_id' =>Thought::inRandomOrder()->first()->id,
            'content'=> fake()->text(),
            'is_anonymous' => true
        ];
    }
}
