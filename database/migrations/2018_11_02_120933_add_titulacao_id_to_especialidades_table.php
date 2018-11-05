<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitulacaoIdToEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especialidades', function (Blueprint $table) {
            $table->integer('titulacao_id')
            ->unsigned()
            ->nullable()
            ->after('ds_especialidade');
            
            $table->foreign('titulacao_id')->references('id')->on('titulacaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidades', function (Blueprint $table) {
            $table->dropForeign('especialidades_titulacao_id_foreign');
            $table->dropColumn('titulacao_id');
        });
    }
}
