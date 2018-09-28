<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpresaUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('representantes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nm_primario', 150);
			$table->string('nm_secundario', 100);
			$table->string('cs_sexo', 1);
			$table->date('dt_nascimento');
			$table->string('telefone', 20);
			$table->string('cpf', 11);
			$table->integer('perfiluser_id');
			$table->integer('empresa_id');
			$table->integer('user_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::table('representantes', function(Blueprint $table)
		{
			$table->foreign('perfiluser_id', 'representantes_perfiluser_id_foreign')->references('id')->on('perfilusers');
			$table->foreign('empresa_id', 'representantes_empresa_id_foreign')->references('id')->on('empresas');
			$table->foreign('user_id', 'representantes_user_id_foreign')->references('id')->on('users');
		});

		Schema::table('empresa_user', function(Blueprint $table)
		{
			$table->dropForeign('empresa_user_empresa_id_foreign');
			$table->dropForeign('empresa_user_contato_id_foreign');
		});

		Schema::drop('empresa_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('representantes', function(Blueprint $table)
		{
			$table->dropForeign('representantes_perfiluser_id_foreign');
			$table->dropForeign('representantes_empresa_id_foreign');
			$table->dropForeign('representantes_user_id_foreign');
		});

		Schema::drop('representantes');

		Schema::create('empresa_user', function(Blueprint $table)
		{
			$table->integer('empresa_id');
			$table->integer('user_id');
			$table->string('telefone', 20);
			$table->string('cpf', 14);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();

			$table->primary(['empresa_id','user_id'], 'empresas_users_pkey');
		});

		Schema::table('empresa_user', function(Blueprint $table)
		{
			$table->foreign('empresa_id', 'empresa_user_empresa_id_foreign')->references('id')->on('empresas');
			$table->foreign('user_id', 'empresa_user_contato_id_foreign')->references('id')->on('users');
		});
    }
}
