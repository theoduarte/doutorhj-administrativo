<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('documento_paciente', function (Blueprint $table) {
    	
    		$table->integer('documento_id')->unsigned()->nullable();
    		$table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
    	
    		$table->integer('paciente_id')->unsigned()->nullable();
    		$table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_paciente');
    }
}
