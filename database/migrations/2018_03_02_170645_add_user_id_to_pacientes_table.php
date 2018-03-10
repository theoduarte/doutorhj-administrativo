<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('pacientes', function (Blueprint $table) {
    		$table->integer('user_id')
    		->unsigned()
    		->nullable()
    		->after('dt_nascimento');
    		 
    		$table->foreign('user_id')->references('id')->on('users');
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
    		$table->dropForeign('pacientes_user_id_foreign');
    		$table->dropColumn('user_id');
    	});
    }
}
