<?php

namespace App\GraphQL\Queries;

use App\Actions\ParseTmdbMovie;
use App\Models\Movie;
use App\Services\TmdbClient;
use Illuminate\Support\Arr;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class SearchMovies
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return ?Movie[]
     */
    public function __invoke($_, array $args): ?array
    {
        $client = TmdbClient::getClient();
        $search = $client->getSearchApi()->searchMovies($args['query'], [
            'language' => 'pt-BR',
            'include_adult' => false,
        ]);
        if ($search['results']) {
            return Arr::map($search['results'], fn ($movie) => ParseTmdbMovie::handle($movie, false));
        }
        return null;
    }
}
