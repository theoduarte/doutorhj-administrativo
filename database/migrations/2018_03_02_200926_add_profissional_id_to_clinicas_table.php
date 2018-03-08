<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfissionalIdToClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('clinicas', function (Blueprint $table) {
    		$table->integer('profissional_id')
    		->unsigned()
    		->nullable()
    		->after('nm_nome_fantasia');
    		 
    		$table->foreign('profissional_id')->references('id')->on('profissionais');
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
    		$table->dropForeign('clinicas_profissional_id_foreign');
    		$table->dropColumn('profissional_id');
    	});
    }
}
