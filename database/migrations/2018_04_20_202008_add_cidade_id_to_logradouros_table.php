<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCidadeIdToLogradourosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('logradouros', function (Blueprint $table) {
    		$table->integer('cidade_id')
    		->unsigned()
    		->nullable()
    		->after('sg_estado');
    	
    		$table->foreign('cidade_id')->references('id')->on('cidades');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('logradouros', function (Blueprint $table) {
    		$table->dropForeign('logradouros_cidade_id_foreign');
    		$table->dropColumn('cidade_id');
    	});
    }
}
