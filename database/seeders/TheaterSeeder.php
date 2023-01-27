<?php

namespace Database\Seeders;

use App\Models\Theater;
use App\Models\TheaterChain;
use Faker\Generator;
use Illuminate\Database\Seeder;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        TheaterChain::all()->each(fn (TheaterChain $theaterChain) => Theater::factory()
                ->count($faker->numberBetween(2, 12))
                ->for($theaterChain)
                ->create()
        );
    }
}
