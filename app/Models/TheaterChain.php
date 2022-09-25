<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TheaterChain
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain query()
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TheaterChain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TheaterChain extends Model
{
    use HasFactory;
}
