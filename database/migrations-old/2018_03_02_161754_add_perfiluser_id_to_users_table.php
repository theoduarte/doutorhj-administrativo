<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPerfiluserIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->integer('perfiluser_id')
    		->unsigned()
    		->nullable()
    		->after('avatar');
    		 
    		$table->foreign('perfiluser_id')->references('id')->on('perfilusers');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('users', function (Blueprint $table) {
    		$table->dropForeign('users_perfiluser_id_foreign');
    		$table->dropColumn('perfiluser_id');
    	});
    }
}
