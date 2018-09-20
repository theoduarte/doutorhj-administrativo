<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('clinica_consulta', function (Blueprint $table) {
    		$table->integer('clinica_id')->unsigned()->nullable();
    		$table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
    		 
    		$table->integer('consulta_id')->unsigned()->nullable();
    		$table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_consulta');
    }
}
