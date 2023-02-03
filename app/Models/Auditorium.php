<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium whereTheaterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auditorium whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Auditorium extends Model
{
    use HasFactory;

    protected $table = 'auditoriums';

    public function theater(): BelongsTo
    {
        return $this->belongsTo(Theater::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
