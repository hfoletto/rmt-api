<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Auditorium
 *
 * @property int $id
 * @property int $theater_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read \App\Models\Theater $theater
 * @method static \Database\Factories\AuditoriumFactory factory(...$parameters)
 * @method static Builder|Auditorium newModelQuery()
 * @method static Builder|Auditorium newQuery()
 * @method static Builder|Auditorium query()
 * @method static Builder|Auditorium whereCreatedAt($value)
 * @method static Builder|Auditorium whereId($value)
 * @method static Builder|Auditorium whereName($value)
 * @method static Builder|Auditorium whereTheaterId($value)
 * @method static Builder|Auditorium whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Auditorium extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;

    protected $table = 'auditoriums';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeWithUniqueSlugConstraints(Builder $query, Auditorium $model, $attribute, $config, $slug): Builder
    {
        return $query->where('theater_id', '=', $model->theater_id);
    }

    public function theater(): BelongsTo
    {
        return $this->belongsTo(Theater::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image');
    }

    protected function featuredImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $this->getMedia('featured_image')?->first(),
        );
    }
}
