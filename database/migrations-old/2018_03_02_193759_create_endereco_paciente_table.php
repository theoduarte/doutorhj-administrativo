<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('endereco_paciente', function (Blueprint $table) {
    		 
    		$table->integer('endereco_id')->unsigned()->nullable();
    		$table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
    		 
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
        Schema::dropIfExists('endereco_paciente');
    }
}
