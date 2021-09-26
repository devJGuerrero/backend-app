<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id()
                  ->comment('Es: Clave primaria moneda | En: Primary key currency');

            $table->jsonb('name')
                  ->default('{}')
                  ->comment('Es: Traducciones nombre de moneda | En: Currency name translations');

            $table->string('symbol', 3)
                  ->comment('Es: Símbolo de moneda | En: Currency symbol');

            $table->string('code', 5)
                  ->unique()
                  ->comment('Es: Código de moneda | En: Currency code');

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
        Schema::dropIfExists('currencies');
    }
}
