<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property int $tmdb_id
 * @property string $title
 * @property string $original_title
 * @property string $overview
 * @property \Illuminate\Support\Carbon $release_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read string|null $poster_url
 * @method static \Database\Factories\MovieFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereOriginalTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTmdbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Movie extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'release_date' => 'date',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('poster')
            ->singleFile();
    }

    protected function posterUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $this->getMedia('poster')?->first()?->original_url,
        );
    }
}
