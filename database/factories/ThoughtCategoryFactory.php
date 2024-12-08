<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Thought;
use App\Models\Thought_Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thought_Category>
 */
class ThoughtCategoryFactory extends Factory
{
    protected $model = Thought_Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' =>Category::inRandomOrder()->first()->id,
            'thought_id' =>Thought::inRandomOrder()->first()->id,
        ];
    }
}
