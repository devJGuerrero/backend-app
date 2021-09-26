<?php

namespace App\JsonApi\Filters;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use LaravelJsonApi\Eloquent\Contracts\Filter;
use LaravelJsonApi\Eloquent\Filters\Concerns\IsSingular;
use LaravelJsonApi\Eloquent\Filters\Concerns\DeserializesValue;

class LanguageFilter implements Filter
{
    use DeserializesValue;
    use IsSingular;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $column;

    /**
     * Create a new filter.
     *
     * @param string $name
     * @param string|null $column
     * @return LanguageFilter
     */
    public static function make(string $name, string $column = null): self
    {
        return new static($name, $column);
    }

    /**
     * LanguageFilter constructor.
     *
     * @param string $name
     * @param string|null $column
     */
    public function __construct(string $name, string $column = null)
    {
        $this->name = $name;
        $this->column = $column ?: Str::underscore($name);
    }

    /**
     * Get the key for the filter.
     *
     * @return string
     */
    public function key(): string
    {
        return $this->name;
    }

    /**
     * Apply the filter to the query.
     *
     * @param Builder $query
     * @param mixed $value
     * @return Builder
     */
    public function apply($query, $value): Builder
    {
        $language = (resolve(Request::class))
                ->input('language') ?? app()->getLocale();
        return $query->where(
            "name->$language", 'ILIKE', "%$value%"
        );
    }
}
