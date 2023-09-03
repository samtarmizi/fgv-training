<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Palm>
 */
class PalmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Trial '.fake()->word,
            'description' => 'Trial Desc '.fake()->sentence,
            'trial_id' => \App\Models\Trial::factory()->create()->id,
            'progeny_id' => \App\Models\Progeny::factory()->create()->id,
        ];
    }
}
