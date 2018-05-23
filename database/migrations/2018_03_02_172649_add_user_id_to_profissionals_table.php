<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('profissionals', function (Blueprint $table) {
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
    	Schema::table('profissionals', function (Blueprint $table) {
    		$table->dropForeign('profissionals_user_id_foreign');
    		$table->dropColumn('user_id');
    	});
    }
}
