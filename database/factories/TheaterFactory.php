<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\TheaterChain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Theater>
 */
class TheaterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'theater_chain_id' => TheaterChain::factory(),
            'city_id' => City::factory(),
            'name' => fake()->city(),
            'address' => fake()->streetAddress(),
        ];
    }
}
