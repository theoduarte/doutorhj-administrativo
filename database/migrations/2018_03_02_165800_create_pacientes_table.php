<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_primario', 50)->nullable()->comment('PRIMEIRO NOME');
            $table->string('nm_secundario', 50)->nullable()->comment('SOBRENOME');
            $table->string('cs_sexo', 1)->nullable()->comment('M => MASCULINO F => FEMININO');
            $table->date('dt_nascimento')->nullable()->comment('DATA DE NASCIMENTO');
<<<<<<< HEAD
            $table->string('access_token', 6)->nullable()->comment('token de acesso.');
            $table->time('time_to_live')->nullable()->comment('tempo de vida do token de acesso.');
=======
            $table->string('access_token', 6)->nullable()->comment('Senha temporaria');
            $table->time('time_to_live')->nullable()->comment('Validade da senha');
>>>>>>> 20c02fbd9c5df214423bb782dd03093cc5d21a78
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
        Schema::dropIfExists('pacientes');
    }
}
