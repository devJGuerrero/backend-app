<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Country -> Colombia (CO) - Currency (COP)
        DB::table('country_currency')->insert([
            'country_id' => config('countries.colombia.id'),
            'currency_id' => config('countries.colombia.currency.id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        # Country -> Colombia (CO) - Currency (USD)
        DB::table('country_currency')->insert([
            'country_id' => config('countries.colombia.id'),
            'currency_id' => config('countries.usa.currency.id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        # Country -> United States (USA) - Currency (USD)
        DB::table('country_currency')->insert([
            'country_id' => config('countries.usa.id'),
            'currency_id' => config('countries.usa.currency.id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
