<?php

namespace Database\Seeders;

use App\Models\TheaterChain;
use Faker\Generator;
use Illuminate\Database\Seeder;

class TheaterChainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        TheaterChain::factory()
            ->count($faker->numberBetween(4, 8))
            ->create();
    }
}
