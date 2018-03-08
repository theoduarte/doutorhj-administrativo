<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 250);
            $table->string('email', 250);
            $table->text('password');
            $table->string('remember_token', 100)->nullable();
			$table->char('tp_user', 3)->nullable()->comment('ADM=>Administrador OPR=>Operador PAC=>Paciente PRO=>Profissional');
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
        Schema::dropIfExists('users');
    }
}
