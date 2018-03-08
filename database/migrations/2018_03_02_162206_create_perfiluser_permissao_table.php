<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfiluserPermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfiluser_permissao', function (Blueprint $table) {
            
        	$table->integer('perfiluser_id')->unsigned()->nullable();
        	$table->foreign('perfiluser_id')->references('id')->on('perfilusers')->onDelete('cascade');
        	 
        	$table->integer('permissao_id')->unsigned()->nullable();
        	$table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
        	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfiluser_permissao');
    }
}
