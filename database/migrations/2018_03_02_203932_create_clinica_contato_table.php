<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('clinica_contato', function (Blueprint $table) {
    		 
    		$table->integer('clinica_id')->unsigned()->nullable();
    		$table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
    		 
    		$table->integer('contato_id')->unsigned()->nullable();
    		$table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_contato');
    }
}
