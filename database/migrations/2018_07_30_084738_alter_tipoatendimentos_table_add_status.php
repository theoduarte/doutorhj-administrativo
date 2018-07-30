<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTipoatendimentosTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipoatendimentos', function (Blueprint $table) {
            $table->string('tag_value')->nullable()->comment('TAG que será usada nos campos de busca.');
            $table->string('cs_status', 1)->default('A')->comment('A => ATIVO I => INATIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipoatendimentos', function (Blueprint $table) {
            $table->dropColumn( ['cs_status','tag_value'] );
        });
    }
}
