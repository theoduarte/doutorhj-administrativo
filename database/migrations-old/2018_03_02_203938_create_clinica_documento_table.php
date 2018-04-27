<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicaDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('clinica_documento', function (Blueprint $table) {
    		 
    		$table->integer('clinica_id')->unsigned()->nullable();
    		$table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');
    		 
    		$table->integer('documento_id')->unsigned()->nullable();
    		$table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinica_documento');
    }
}
