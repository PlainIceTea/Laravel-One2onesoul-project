<?php

namespace Database\Factories;

use App\Models\reply;
use App\Models\Thought;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pilih secara acak antara 'thought' atau 'reply' untuk content_type
        $contentType = $this->faker->randomElement(['thought', 'reply']);
        
        // Tentukan content_id sesuai dengan content_type
        $contentId = $contentType === 'thought' 
            ? Thought::factory()->create()->id  // Jika 'thought', buat dan ambil ID Thought
            : reply::factory()->create()->id;   // Jika 'reply', buat dan ambil ID Reply

        return [
            'content_type' => $contentType,  // Menggunakan 'thought' atau 'reply'
            'content_id' => $contentId,      // ID yang sesuai dengan content_type
            'user_id' => User::inRandomOrder()->first()->id,,    // Menggunakan factory User untuk user_id
            'reason' => $this->faker->sentence(),  // Alasan laporan (kalimat acak)
        ];
    }
}
