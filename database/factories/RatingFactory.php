<?php

namespace Database\Factories;

use App\Models\Auditorium;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'auditorium_id' => Auditorium::factory(),
            'image_rating' => fake()->optional(0.8)->numberBetween(1, 5),
            'audio_rating' => fake()->optional(0.8)->numberBetween(1, 5),
            'comfort_rating' => fake()->optional(0.8)->numberBetween(1, 5),
            'bomboniere_rating' => fake()->optional(0.8)->numberBetween(1, 5),
            'experience_rating' => fake()->optional(0.8)->numberBetween(1, 5),
            'review' => fake()->optional(0.8)->paragraphs(rand(1, 5), true),
            'visited_at' => fake()->date(),
            'movie_watched_id' => Movie::factory(),
            'seat' => fake()->optional()->regexify('[A-O]{1}[0-2]{1}[0-9]{1}'),
            'seat_rating' => fake()->optional()->numberBetween(1, 5),
        ];
    }
}
