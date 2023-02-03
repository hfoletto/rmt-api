<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Theater
 *
 * @property int $id
 * @property int $theater_chain_id
 * @property int $city_id
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Auditorium[] $auditoriums
 * @property-read int|null $auditoriums_count
 * @property-read \App\Models\City $city
 * @property-read \App\Models\TheaterChain $theaterChain
 * @method static \Database\Factories\TheaterFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereTheaterChainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theater whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Theater extends Model
{
    use HasFactory;

    public function theaterChain(): BelongsTo
    {
        return $this->belongsTo(TheaterChain::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function auditoriums(): HasMany
    {
        return $this->hasMany(Auditorium::class);
    }
}
