<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('contato_profissional', function (Blueprint $table) {
    		 
    		$table->integer('contato_id')->unsigned()->nullable();
    		$table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
    		 
    		$table->integer('profissional_id')->unsigned()->nullable();
    		$table->foreign('profissional_id')->references('id')->on('profissionais')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contato_profissional');
    }
}
