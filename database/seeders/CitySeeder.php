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
        City::upsert([
            ['name' => 'São Paulo', 'state_id' => $states->firstWhere('uf', 'SP')->id],
            ['name' => 'Rio de Janeiro', 'uf' => $states->firstWhere('uf', 'RJ')->id],
            ['name' => 'Brasília', 'uf' => $states->firstWhere('uf', 'DF')->id],
            ['name' => 'Recife', 'uf' => $states->firstWhere('uf', 'PR')->id],
            ['name' => 'Belo Horizonte', 'uf' => $states->firstWhere('uf', 'MG')->id],
            ['name' => 'Maringá', 'uf' => $states->firstWhere('uf', 'PR')->id],
            ['name' => 'Balneário Camboriú', 'uf' => $states->firstWhere('uf', 'SC')->id],
        ], ['name', 'state_id'], ['name']);
    }
}
