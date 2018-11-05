<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTitulacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacaos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('titulo', 200)->nullable();
        	$table->integer('tempo_formacao')->nullable()->comment('tempo em meses');
        	$table->text('amb')->nullable()->comment('Associação Médica Brasileira');
        	$table->text('cnrm')->nullable()->comment('Comissão Nacional de Residência Médica ');
        	$table->timestamp('created_at')->default(DB::raw('NOW()'));
        	$table->timestamp('updated_at')->default(DB::raw('NOW()'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulacaos');
    }
}
