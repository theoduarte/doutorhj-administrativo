<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPerfiluserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_perfiluser', function (Blueprint $table) {
            
        	$table->integer('menu_id')->unsigned()->nullable();
        	$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        	
        	$table->integer('perfiluser_id')->unsigned()->nullable();
        	$table->foreign('perfiluser_id')->references('id')->on('perfilusers')->onDelete('cascade');
        	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_perfiluser');
    }
}
