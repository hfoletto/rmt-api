<?php

namespace App\Actions;

use App\Models\Movie;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Throwable;

class ParseTmdbMovie
{

    /**
     * @param array $tmdb_movie
     * @return Movie
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws Throwable
     */
    static public function handle(array $tmdb_movie): Movie
    {
        try {
            DB::beginTransaction();

            $movie = new Movie();
            $movie->tmdb_id = Arr::get($tmdb_movie, 'id');
            $movie->title = Arr::get($tmdb_movie, 'title');
            $movie->original_title = Arr::get($tmdb_movie, 'original_title');
            $movie->overview = Arr::get($tmdb_movie, 'overview');
            $movie->release_date = Arr::get($tmdb_movie, 'release_date');
            $movie->save();

            // Poster image
            if ($image_name = Str::remove('/', Arr::get($tmdb_movie, 'poster_path'))) {
                Storage::disk('local')->put($image_name, file_get_contents('https://image.tmdb.org/t/p/w500/' . $image_name));
                $movie
                    ->addMedia(storage_path('app/' . $image_name))
                    ->toMediaCollection('poster');
            }

            DB::commit();

            return $movie;
        } catch (Throwable $e) {
            DB::rollBack();
            logger($e);
            throw $e;
        }
    }

}
