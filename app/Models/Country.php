<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'currency_id',
        'calling_code',
        'tld',
        'cca2',
        'ccn3',
        'cca3',
        'cioc',
        'independent',
        'active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'array', 'calling_code' => 'array', 'tld' => 'array'
    ];

    /**
     * Get the currency that owns the country.
     *
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * The currencies that belong to the country.
     *
     * @return BelongsToMany
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class);
    }
}
