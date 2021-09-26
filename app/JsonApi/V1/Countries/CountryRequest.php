<?php

namespace App\JsonApi\V1\Countries;

use App\Models\Country;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;

class CountryRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $generic = [
            'name'        => ['required', 'array'  ],
            'currencyId'  => ['required', 'numeric'],
            'callingCode' => ['required', 'array'  ],
            'tld'         => ['required', 'array'  ],
            'independent' => ['required', 'boolean'],
            'active'      => ['required', 'boolean'],
        ];
        return match ($this->method()) {
            'POST' => array_merge($generic, [
                'cca2' => ['required', 'string', 'max:5' , 'unique:'.Country::class],
                'ccn3' => ['required', 'string', 'max:10', 'unique:'.Country::class],
                'cca3' => ['required', 'string', 'max:5' , 'unique:'.Country::class],
                'cioc' => ['required', 'string', 'max:5' , 'unique:'.Country::class],
            ]),
            'PUT', 'PATCH' => $generic,
            default => [],
        };
    }

}
