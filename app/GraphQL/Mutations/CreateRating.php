<?php

namespace App\GraphQL\Mutations;

use App\Actions\ParseTmdbMovie;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use App\Services\TmdbClient;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class CreateRating
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): Rating
    {
        $guard = Auth::guard('web');

        /** @var User|null $user */
        $user = $guard->user();

        $movie = Movie::whereTmdbId(Arr::get($args, 'tmdb_movie_id'))->first();
        if (!$movie) {
            $client = TmdbClient::getClient();
            $tmdb_movie = $client->getMoviesApi()->getMovie(Arr::get($args, 'tmdb_movie_id'), [
                'language' => 'pt-BR',
                'region' => 'BR',
            ]);
            $movie = ParseTmdbMovie::handle($tmdb_movie);
        }

        $rating = $user->ratings()->create([
            'auditorium_id' => Arr::get($args, 'auditorium_id'),
            'image_rating' => Arr::get($args, 'image_rating'),
            'audio_rating' => Arr::get($args, 'audio_rating'),
            'comfort_rating' => Arr::get($args, 'comfort_rating'),
            'bomboniere_rating' => Arr::get($args, 'bomboniere_rating'),
            'experience_rating' => Arr::get($args, 'experience_rating'),
            'review' => Arr::get($args, 'review'),
            'visited_at' => Arr::get($args, 'visited_at'),
            'movie_watched_id' => $movie->id,
            'seat' => Arr::get($args, 'seat'),
            'seat_rating' => Arr::get($args, 'seat_rating'),
        ]);

        return $rating;
    }
}
