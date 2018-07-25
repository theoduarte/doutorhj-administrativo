<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCidadeIdToEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('enderecos', function (Blueprint $table) {
    		$table->integer('cidade_id')
    		->unsigned()
    		->nullable()
    		->after('nr_longitute_gps');
    		 
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
    	Schema::table('enderecos', function (Blueprint $table) {
    		$table->dropForeign('enderecos_cidade_id_foreign');
    		$table->dropColumn('cidade_id');
    	});
    }
}
