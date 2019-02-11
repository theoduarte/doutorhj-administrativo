<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanoIdToCampanhaVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('campanha_vendas', function (Blueprint $table) {
    		$table->integer('plano_id')
    		->unsigned()
    		->nullable()
    		->after('empresa_id');
    		 
    		$table->foreign('plano_id')->references('id')->on('planos');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('campanha_vendas', function (Blueprint $table) {
    		$table->dropForeign('campanha_vendas_plano_id_foreign');
    		$table->dropColumn('plano_id');
    	});
    }
}
