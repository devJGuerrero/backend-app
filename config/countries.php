<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Country settings
    |--------------------------------------------------------------------------
    |
    | Settings referring to the countries used in the application or packages.
    |
    */
    'colombia' => [
        'id' => 1,
        'cca2' => env('COUNTRY_CODE_CCA2_COLOMBIA'),
        'currency' => [
            'id' => 1,
            'code' => env('COUNTRY_CURRENCY_CODE_COLOMBIA')
        ],
    ],
    'usa' => [
        'id' => 2,
        'cca2' => env('COUNTRY_CODE_CCA2_USA'),
        'currency' => [
            'id' => 2,
            'code' => env('COUNTRY_CURRENCY_CODE_USA')
        ],
    ],
];
