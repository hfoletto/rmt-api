<?php

namespace Database\Factories;

use App\Models\Auditorium;
use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'description' => fake()->sentence(rand(12, 48)),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Auditorium $auditorium) {

            $images = Storage::disk('resources')->allFiles('img/auditoriums');
            $random_image = $images[rand(0, count($images) - 1)];

            $auditorium
                ->addMedia(resource_path($random_image))
                ->preservingOriginal()
                ->toMediaCollection('featured_image');
        });
    }

}
