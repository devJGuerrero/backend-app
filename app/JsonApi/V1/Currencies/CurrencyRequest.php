<?php

namespace App\JsonApi\V1\Currencies;

use App\Models\Currency;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class CurrencyRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'array' ],
            'name.eng' => ['required', 'string'],
            'name.fra' => ['required', 'string'],
            'name.por' => ['required', 'string'],
            'name.spa' => ['required', 'string'],
            'symbol'   => ['required', 'string', 'max:3'],
            'code'     => ['required', 'string', 'max:5', 'unique:'.Currency::class],
        ];
    }

}
