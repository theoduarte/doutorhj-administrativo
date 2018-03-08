<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_cidade', 80)->nullable()->comment('NOME DA CIDADE CONFORME IBGE');
            $table->string('cd_ibge', 25)->nullable()->comment('CÓDIGO IBGE');
            $table->string('sg_cidade', 4)->nullable()->comment('SIGLA DA CIDADE CONFORME IBGE');
			$table->string('ds_estado', 30)->nullable();
			$table->string('sg_estado', 2)->nullable();
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
        Schema::dropIfExists('cidades');
    }
}
