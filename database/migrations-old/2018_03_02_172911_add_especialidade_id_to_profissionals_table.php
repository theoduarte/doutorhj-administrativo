<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspecialidadeIdToProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('profissionals', function (Blueprint $table) {
    		$table->integer('especialidade_id')
    		->unsigned()
    		->nullable()
    		->after('user_id');
    		 
    		$table->foreign('especialidade_id')->references('id')->on('especialidades');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('especialidades', function (Blueprint $table) {
    	    $table->dropForeign('profissionals_especialidade_id_foreign');
    	    $table->dropColumn('especialidade_id');
    	});
    }
}
