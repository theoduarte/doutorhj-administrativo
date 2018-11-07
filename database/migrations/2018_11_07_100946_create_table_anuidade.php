<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnuidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id');
            $table->integer('plano_id');
            $table->decimal('vl_anuidade_ano');
            $table->decimal('vl_anuidade_mes');
			$table->string('cs_status', 1);
			$table->date('data_inicio');
			$table->date('data_fim');
			$table->timestamps();
			$table->softDeletes();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('plano_id')->references('id')->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('anuidades');
    }
}
