<?php

namespace Database\Factories;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auditorium>
 */
class AuditoriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'theater_id' => Theater::factory(),
            'name' => fake()->word(),
        ];
    }
}
