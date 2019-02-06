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
    	Schema::table('campanha_vendas', function (Blueprint $table) {
    		$table->integer('empresa_id')
    		->unsigned()
    		->nullable()
    		->after('cs_status');
    		 
    		$table->foreign('empresa_id')->references('id')->on('empresas');
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
    		$table->dropForeign('campanhavendas_empresa_id_foreign');
    		$table->dropColumn('empresa_id');
    	});
    }
}
