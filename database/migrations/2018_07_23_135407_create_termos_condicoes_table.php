<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermosCondicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termos_condicoes', function (Blueprint $table) {
            $table->increments('id');

            $table->datetime('dt_inicial');
            $table->datetime('dt_final')->nullable();
            $table->text('ds_termo');
            $table->string('cs_status', 1)->default('A');

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
        Schema::dropIfExists('termos_condicoes');
    }
}
