<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cd_procedimento', 10)->nullable()->comment('CÓDIGO DO PROCEDIMENTO UTILIZADO PELA S1 SAÚDE');
            $table->string('ds_procedimento', 100)->nullable()->comment('DESCRIÇÃO DO PROCEDIMENTO UTILIZADO INTERNAMENTE PELA S1 SAÚDE');
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
        Schema::dropIfExists('procedimentos');
    }
}
