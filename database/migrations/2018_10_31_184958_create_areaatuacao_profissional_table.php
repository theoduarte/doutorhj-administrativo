<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaatuacaoProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areaatuacao_profissional', function (Blueprint $table) {
            
        	$table->integer('areaatuacao_id')->unsigned()->nullable();
        	$table->foreign('areaatuacao_id')->references('id')->on('area_atuacaos')->onDelete('cascade');
        	 
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
        Schema::dropIfExists('areaatuacao_profissional');
    }
}
