<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\TheaterChain
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Theater[] $theaters
 * @property-read int|null $theaters_count
 * @method static \Database\Factories\TheaterChainFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain query()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TheaterChain extends Model
{
    use HasFactory;

    public function theaters(): HasMany
    {
        return $this->hasMany(Theater::class);
    }
}
