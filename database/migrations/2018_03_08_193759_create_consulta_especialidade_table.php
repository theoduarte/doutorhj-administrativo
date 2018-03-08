<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaEspecialidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('consulta_especialidade', function (Blueprint $table) {
    		 
    		$table->integer('consulta_id')->unsigned()->nullable();
    		$table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
    		
    		$table->integer('especialidade_id')->unsigned()->nullable();
    		$table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta_especialidade');
    }
}