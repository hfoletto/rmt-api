<?php

namespace Database\Seeders;

use App\Actions\ParseTmdbMovie;
use App\Services\TmdbClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = Storage::disk('resources')->get('data/tmdb-movies-ids.json');
        $json = json_decode($file, true);

        $client = TmdbClient::getClient();
        foreach ($json as $tmdb_movie_id) {
            $movie = $client->getMoviesApi()->getMovie($tmdb_movie_id, [
                'language' => 'pt-BR',
                'region' => 'BR',
            ]);
            try {
                ParseTmdbMovie::handle($movie);
            } catch (FileDoesNotExist|FileIsTooBig|\Throwable $e) {
                continue;
            }
        }
    }
}
