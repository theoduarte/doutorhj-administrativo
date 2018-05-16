<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('clinica_endereco', function (Blueprint $table) {
    		 
    		$table->integer('clinica_id')->unsigned()->nullable();
    		$table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
    		 
    		$table->integer('endereco_id')->unsigned()->nullable();
    		$table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_endereco');
    }
}
