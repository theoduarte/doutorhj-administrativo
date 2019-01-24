<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContatoIdToCorretorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('corretors', function (Blueprint $table) {
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
    	Schema::table('corretors', function (Blueprint $table) {
    		$table->dropForeign('corretors_contato_id_foreign');
    		$table->dropColumn('contato_id');
    	});
    }
}
