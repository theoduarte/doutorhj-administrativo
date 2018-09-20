<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsConditionsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termos_condicoes_usuarios', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('termo_condicao_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('termo_condicao_id')->references('id')->on('termos_condicoes');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('termos_condicoes_usuarios');
    }
}
