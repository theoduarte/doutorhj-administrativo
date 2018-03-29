<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCargoIdToProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('profissionals', function (Blueprint $table) {
    		$table->integer('cargo_id')
    		->unsigned()
    		->nullable()
    		->after('especialidade_id');
    		 
    		$table->foreign('cargo_id')->references('id')->on('cargos');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('profissionals', function (Blueprint $table) {
    		$table->dropForeign('profissionals_cargo_id_foreign');
    		$table->dropColumn('cargo_id');
    	});
    }
}
