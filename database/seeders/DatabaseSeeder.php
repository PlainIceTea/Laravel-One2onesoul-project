<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\reply;
use App\Models\Thought;
use App\Models\Thought_Category;
use App\Models\User;
use App\Models\Vote;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
    User::factory(10)->create();

    
    Thought::factory(20)->create();

    
    reply::factory(50)->create();

    
    Vote::factory(20)->create();

   
    Category::factory(20)->create();

    
    Thought_Category::factory(20)->create();

    
    }
}
