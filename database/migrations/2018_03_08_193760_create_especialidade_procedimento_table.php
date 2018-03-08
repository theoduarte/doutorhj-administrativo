<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadeProcedimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('especialidade_procedimento', function (Blueprint $table) {
    		 
    		$table->integer('especialidade_id')->unsigned()->nullable();
    		$table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
    		
    		$table->integer('procedimento_id')->unsigned()->nullable();
    		$table->foreign('procedimento_id')->references('id')->on('procedimentos')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidade_procedimento');
    }
}