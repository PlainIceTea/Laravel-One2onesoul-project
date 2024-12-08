<?php

namespace Database\Factories;

use App\Models\reply;
use App\Models\Thought;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
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
            'reply_id' =>Reply::inRandomOrder()->first()->id,
        ];
    }
}
