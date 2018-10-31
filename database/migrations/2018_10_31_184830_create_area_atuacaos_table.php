<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaAtuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_atuacaos', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('titulo', 200);
        	$table->string('cs_status', 1)->comment('A => ATIVO I => INATIVO');
        	$table->timestamp('created_at')->default(DB::raw('NOW()'));
        	$table->timestamp('updated_at')->default(DB::raw('NOW()'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_atuacaos');
    }
}
