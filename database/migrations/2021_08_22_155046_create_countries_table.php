<?php

use Psy\Util\Json;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id()
                  ->comment('Es: Clave primaria países | En: Primary key countries');

            $table->jsonb('name')
                  ->default(Json::encode([
                    'common'   => ['eng' => '', 'spa' => '', 'fra' => '', 'por' => ''],
                    'official' => ['eng' => '', 'spa' => '', 'fra' => '', 'por' => ''],
                  ]))
                  ->comment('Es: Traducciones nombre de país | En: Country name translations');

            $table->foreignId('currency_id')
                  ->comment('Es: Moneda asignada por defecto | En: Currency assigned by default')
                  ->constrained();

            $table->jsonb('calling_code')
                  ->default('[]')
                  ->comment('Es: Códigos telefonicos | En: Phone codes');

            $table->jsonb('tld')
                  ->default('[]')
                  ->comment('Es: Dominio de nivel superior de código de país | En: Country code top-level domain');

            $table->string('cca2', 5)
                  ->unique()
                  ->comment('Es: Código ISO 3166-1 alpha-2 | En: ISO 3166-1 alpha-2 code');

            $table->string('ccn3', 10)
                  ->unique()
                  ->comment('Es: Código ISO 3166-1 numérico | En: ISO 3166-1 code numeric');

            $table->string('cca3', 5)
                  ->unique()
                  ->comment('Es: Código ISO 3166-1 alpha-3 | En: ISO 3166-1 alpha-3 code');

            $table->string('cioc', 5)
                  ->unique()
                  ->comment('Es: Código Comité Olímpico Internacional | En: International Olympic Committee Code');

            $table->boolean('independent')
                  ->default(true)
                  ->comment('Es: Estado de independencia ISO 3166-1 | En: State of independence ISO 3166-1');

            $table->boolean('active')
                  ->default(false)
                  ->comment('Es: Estado de visibilidad | En: Visibility status');

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
        Schema::dropIfExists('countries');
    }
}
