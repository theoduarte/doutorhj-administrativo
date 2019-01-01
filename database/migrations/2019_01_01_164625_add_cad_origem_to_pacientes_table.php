<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCadOrigemToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->string('cad_origem', 10)->after('time_to_live')->comment('WEB => cadastro autônomo feito no site pelo usuário MOB => cadastro autônomo feito no aplicativo pelo usuário EMP => cadastro realizado na aplicação empresarial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn('cad_origem');
        });
    }
}
