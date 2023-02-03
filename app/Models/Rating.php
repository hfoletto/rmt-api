<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property int $user_id
 * @property int $auditorium_id
 * @property int|null $image_rating
 * @property int|null $audio_rating
 * @property int|null $comfort_rating
 * @property int|null $bomboniere_rating
 * @property int|null $experience_rating
 * @property string|null $review
 * @property string $visited_at
 * @property string $movie_watched
 * @property string|null $seat
 * @property string|null $seat_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Auditorium $auditorium
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\RatingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Query\Builder|Rating onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereAudioRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereAuditoriumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereBomboniereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereComfortRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereExperienceRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereImageRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereMovieWatched($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereSeatRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereVisitedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Rating withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Rating withoutTrashed()
 * @mixin \Eloquent
 */
class Rating extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function auditorium(): BelongsTo
    {
        return $this->belongsTo(Auditorium::class);
    }

    public function scopeHasImageRating($query)
    {
        return $query->whereNotNull('image_rating');
    }

    public function scopeHasAudioRating($query)
    {
        return $query->whereNotNull('audio_rating');
    }

    public function scopeHasComfortRating($query)
    {
        return $query->whereNotNull('comfort_rating');
    }

    public function scopeHasBomboniereRating($query)
    {
        return $query->whereNotNull('bomboniere_rating');
    }

    public function scopeHasExperienceRating($query)
    {
        return $query->whereNotNull('experience_rating');
    }
}
