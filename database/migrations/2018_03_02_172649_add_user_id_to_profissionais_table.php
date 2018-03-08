<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('profissionais', function (Blueprint $table) {
    		$table->integer('user_id')
    		->unsigned()
    		->nullable()
    		->after('cs_status');
    		 
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
    	Schema::table('profissionais', function (Blueprint $table) {
    		$table->dropForeign('profissionais_user_id_foreign');
    		$table->dropColumn('user_id');
    	});
    }
}
