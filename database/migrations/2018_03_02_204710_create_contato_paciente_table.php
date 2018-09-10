<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('contato_paciente', function (Blueprint $table) {
    		 
    		$table->integer('contato_id')->unsigned()->nullable();
    		$table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
    		 
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
        Schema::dropIfExists('contato_paciente');
    }
}
