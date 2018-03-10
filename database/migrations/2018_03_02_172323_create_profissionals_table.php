<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_primario', 50)->nullable()->comment('PRIMEIRO NOME');
            $table->string('nm_secundario', 100)->nullable()->comment('SOBRENOME');
            $table->string('cs_sexo', 1)->nullable()->comment('M => MASCULINO F => FEMININO');
            $table->date('dt_nascimento')->nullable()->comment('DATA DE NASCIMENTO');
            $table->string('tp_profissional', 1)->nullable()->comment('M => MÉDICO O => OPERADOR L => PROFISSIONAL LIBERAL A => ADMINISTRADOR');
            $table->string('cs_status', 1)->nullable()->comment('A => ATIVO I => INATIVO');
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
        Schema::dropIfExists('profissionals');
    }
}
