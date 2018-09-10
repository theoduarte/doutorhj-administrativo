<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ds_estado', 30)->nullable()->comment('DESCRIÇÃO DO ESTADO CONFORME IBGE');
            $table->integer('cd_ibge')->nullable()->comment('DESCRIÇÃO DO ESTADO CONFORME IBGE');
            $table->string('sg_estado', 2)->nullable()->comment('SIGLA DO ESTADO');
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
        Schema::dropIfExists('estados');
    }
}
