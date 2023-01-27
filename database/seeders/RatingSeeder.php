<?php

namespace Database\Seeders;

use App\Models\Auditorium;
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
        Auditorium::all()->each(function (Auditorium $auditorium) use ($faker, $user_ids) {
            Rating::factory()
                ->count($faker->numberBetween(0, 20))
                ->for($auditorium)
                ->sequence(fn (Sequence $sequence) => ['user_id' => $user_ids->random()])
                ->create();
        });
    }
}
