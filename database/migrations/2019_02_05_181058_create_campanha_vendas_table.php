<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhaVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanha_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url_param', 50);
            $table->text('ds_campanha');
            $table->timestamp('data_inicio');
            $table->timestamp('data_fim');
            $table->char('cs_status', 1)->nullable('A')->comment('A=>Ativo I=>Inativo');
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
        Schema::dropIfExists('campanha_vendas');
    }
}
