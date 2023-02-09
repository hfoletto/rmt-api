<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = State::all();
        City::updateOrCreate(
            ['name' => 'São Paulo', 'state_id' => $states->firstWhere('uf', 'SP')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Rio de Janeiro', 'state_id' => $states->firstWhere('uf', 'RJ')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Brasília', 'state_id' => $states->firstWhere('uf', 'DF')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Recife', 'state_id' => $states->firstWhere('uf', 'PR')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Belo Horizonte', 'state_id' => $states->firstWhere('uf', 'MG')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Maringá', 'state_id' => $states->firstWhere('uf', 'PR')->id],
            []
        );
        City::updateOrCreate(
            ['name' => 'Balneário Camboriú', 'state_id' => $states->firstWhere('uf', 'SC')->id],
            []
        );
    }
}
