<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaProcedimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('clinica_procedimento', function (Blueprint $table) {
    		 
    		$table->integer('clinica_id')->unsigned()->nullable();
    		$table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
    		 
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
        Schema::dropIfExists('clinica_procedimento');
    }
}
