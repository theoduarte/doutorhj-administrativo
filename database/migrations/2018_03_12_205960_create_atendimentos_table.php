<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('vl_atendimento', 10)->nullable();
            $table->string('ds_preco', 150)->nullable();
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
        Schema::dropIfExists('atendimentos');
    }
}