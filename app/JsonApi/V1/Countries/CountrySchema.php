<?php

namespace App\JsonApi\V1\Countries;

use App\Models\Country;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Boolean;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Fields\ArrayList;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;

class CountrySchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Country::class;

    /**
     * Whether resources of this type have a self link.
     *
     * @var bool
     */
    protected bool $selfLink = false;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            ArrayHash::make('name'),
            Number::make('currencyId', 'currency_id'),
            BelongsTo::make('currency'),
            BelongsToMany::make('currencies'),
            ArrayList::make('callingCode', 'calling_code'),
            ArrayList::make('tld'),
            Str::make('cca2'),
            Str::make('ccn3'),
            Str::make('cca3'),
            Str::make('cioc'),
            Boolean::make('independent'),
            Boolean::make('active'),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
