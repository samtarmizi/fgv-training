<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Record '.fake()->word,
            'description' => 'RecordFactory Desc '.fake()->sentence,
            'data' => rand(1999,9999),
            'palm_id' => \App\Models\Palm::factory()->create()->id,
        ];
    }
}
