<?php

namespace App\JsonApi\V1\Currencies;

use App\Models\Currency;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use App\JsonApi\Filters\LanguageFilter;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;

class CurrencySchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Currency::class;

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
            Str::make('symbol'),
            Str::make('code'),
            BelongsToMany::make('countries'),
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
            Where::make('id'),
            LanguageFilter::make('name'),
            Where::make('code'),
            Where::make('symbol'),
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
