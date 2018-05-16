<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuIdToItemmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('itemmenus', function (Blueprint $table) {
    		$table->integer('menu_id')
    		->unsigned()
    		->nullable()
    		->after('ordemexibicao');
    		 
    		$table->foreign('menu_id')->references('id')->on('menus');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('itemmenus', function (Blueprint $table) {
    		$table->dropForeign('itemmenus_menu_id_foreign');
    		$table->dropColumn('menu_id');
    	});
    }
}
