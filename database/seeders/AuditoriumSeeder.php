<?php

namespace Database\Seeders;

use App\Models\Auditorium;
use App\Models\Theater;
use App\Models\TheaterChain;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AuditoriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        Theater::all()->each(function (Theater $theater) use ($faker) {
            $order = 1;
            Auditorium::factory()
                ->count($faker->numberBetween(2, 9))
                ->for($theater)
                ->sequence(fn (Sequence $sequence) => ['name' => 'Sala ' . ($sequence->index + 1)])
                ->create();
        });
    }
}
