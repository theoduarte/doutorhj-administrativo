<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmpresaIdToCampanhaVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('empresas', function (Blueprint $table) {
    		$table->integer('contato_id')
    		->unsigned()
    		->nullable()
    		->after('documento_id');
    		 
    		$table->foreign('contato_id')->references('id')->on('contatos');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
