<?php

namespace Database\Seeders;

use App\Models\Auditorium;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);
        $user_ids = User::all()->pluck('id');
        $movies = Movie::all();
        Auditorium::all()->each(function (Auditorium $auditorium) use ($movies, $faker, $user_ids) {
            Rating::factory()
                ->count($faker->numberBetween(1, 20))
                ->for($auditorium)
                ->sequence(function (Sequence $sequence) use ($user_ids, $movies, $faker) {
                    /** @var Movie $movie */
                    $movie = $movies->random();
                    return[
                        'user_id' => $user_ids->random(),
                        'movie_watched_id' => $movie->id,
                        'visited_at' => $faker->dateTimeBetween($movie->release_date, strtotime('+3 weeks', $movie->release_date->format('U'))),
                    ];
                })
                ->create();
        });
    }
}
