<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('endereco_profissional', function (Blueprint $table) {
    	
    		$table->integer('endereco_id')->unsigned()->nullable();
    		$table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
    	
    		$table->integer('profissional_id')->unsigned()->nullable();
    		$table->foreign('profissional_id')->references('id')->on('profissionals')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco_profissional');
    }
}
