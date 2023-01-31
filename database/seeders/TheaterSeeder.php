<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Theater;
use App\Models\TheaterChain;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        $cities = City::all();

        TheaterChain::all()->each(fn (TheaterChain $theaterChain) => Theater::factory()
                ->count($faker->numberBetween(2, 12))
                ->for($theaterChain)
                ->state(new Sequence(function ($sequence) use ($cities, $theaterChain, $faker) {
                    $city = $cities->random();

                    return [
                        'city_id' => $city,
                        'name' => "$theaterChain->name ".ucfirst($faker->word)." $city->name",
                    ];
                }))
                ->create()
        );
    }
}
