<?php

namespace Database\Seeders;

use Psy\Util\Json;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Colombian peso
        DB::table('currencies')->insert([
            'name' => Json::encode([
                'eng' => 'Colombian peso',
                'spa' => 'Peso colombiano',
                'fra' => 'Peso colombien',
                'por' => 'Peso colombiano',
            ]),
            'symbol' => '$',
            'code' => 'COP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        # American dollar
        DB::table('currencies')->insert([
            'name' => Json::encode([
                'eng' => 'United States dollar',
                'spa' => 'Dólar de los Estados Unidos',
                'fra' => 'Dollar américain',
                'por' => 'Dólar dos Estados Unidos',
            ]),
            'symbol' => '$',
            'code' => 'USD',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
