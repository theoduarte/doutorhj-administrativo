<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCargoIdToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('pacientes', function (Blueprint $table) {
    		$table->integer('cargo_id')
    		->unsigned()
    		->nullable()
    		->after('user_id');
    		 
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
    	Schema::table('pacientes', function (Blueprint $table) {
    		$table->dropForeign('pacientes_cargo_id_foreign');
    		$table->dropColumn('cargo_id');
    	});
    }
}
