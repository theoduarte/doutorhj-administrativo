<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateLogradourosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logradouros', function (Blueprint $table) {
        	$table->increments('id');
        	$table->integer('altitude')->nullable();
        	$table->string('te_bairro', 100)->nullable()->comment('NOME DO BAIRRO');
        	$table->string('nr_cep', 9)->nullable();
        	$table->float('latitude', 10)->nullable();
        	$table->float('longitude', 10)->nullable();
        	$table->string('tp_logradouro', 50)->nullable()->comment('TIPO DE LOGRADOURO');
        	$table->text('te_logradouro')->nullable()->comment('DESCRIÇÃO DO ENDEREÇO');
        	$table->string('cd_ibge', 25)->nullable();
        	$table->string('nr_ddd', 3)->nullable();
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
        Schema::dropIfExists('logradouros');
    }
}
