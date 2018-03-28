<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResponsavelIdToClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('clinicas', function (Blueprint $table) {
    		$table->integer('responsavel_id')
    		->unsigned()
    		->nullable()
    		->after('nm_nome_fantasia');
    		 
    		$table->foreign('responsavel_id')->references('id')->on('responsavels');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('clinicas', function (Blueprint $table) {
    		$table->dropForeign('clinicas_responsavel_id_foreign');
    		$table->dropColumn('responsavel_id');
    	});
    }
}
