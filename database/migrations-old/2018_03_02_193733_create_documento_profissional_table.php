<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_profissional', function (Blueprint $table) {
            
        	$table->integer('documento_id')->unsigned()->nullable();
        	$table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade');
        	 
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
        Schema::dropIfExists('documento_profissional');
    }
}
