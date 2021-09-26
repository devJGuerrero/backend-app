<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_currency', function (Blueprint $table) {
            $table->id()
                  ->comment('Es: Clave primaria países - monedas | En: Primary key countries - currencies');

            $table->foreignId('country_id')
                  ->comment('Es: Clave foránea país | En: Foreign country key')
                  ->constrained();

            $table->foreignId('currency_id')
                  ->comment('Es: Clave foránea moneda | En: Foreign key currency')
                  ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_currency');
    }
}
