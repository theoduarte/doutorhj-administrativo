<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitoTitulacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisito_titulacao', function (Blueprint $table) {
            
            $table->integer('requisito_id')->unsigned()->nullable();
            $table->foreign('requisito_id')->references('id')->on('requisitos')->onDelete('cascade');
            
            $table->integer('titulacao_id')->unsigned()->nullable();
            $table->foreign('titulacao_id')->references('id')->on('titulacaos')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisito_titulacao');
    }
}
