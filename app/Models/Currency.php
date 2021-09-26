<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'symbol',
        'code',
        'country_id',
        'default',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'array'
    ];

    /**
     * The countries that belong to the currency.
     *
     * @return BelongsToMany
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }
}
