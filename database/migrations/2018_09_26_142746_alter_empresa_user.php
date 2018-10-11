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
			$table->integer('perfiluser_id');
			$table->integer('user_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('contato_representante', function(Blueprint $table)
		{
			$table->integer('contato_id');
			$table->integer('representante_id');
			$table->primary(['contato_id','representante_id'], 'contatos_representantes_pkey');
		});

		Schema::create('documento_representante', function(Blueprint $table)
		{
			$table->integer('documento_id');
			$table->integer('representante_id');
			$table->primary(['documento_id','representante_id'], 'documentos_representantes_pkey');
		});

		Schema::create('empresa_representante', function(Blueprint $table)
		{
			$table->integer('empresa_id');
			$table->integer('representante_id');
			$table->primary(['empresa_id','representante_id'], 'empresas_representantes_pkey');
		});

		Schema::table('representantes', function(Blueprint $table)
		{
			$table->foreign('perfiluser_id', 'representantes_perfiluser_id_foreign')->references('id')->on('perfilusers');
			$table->foreign('user_id', 'representantes_user_id_foreign')->references('id')->on('users');
		});

		Schema::table('contato_representante', function(Blueprint $table)
		{
			$table->foreign('contato_id', 'contato_representante_contato_id_foreign')->references('id')->on('contatos');
			$table->foreign('representante_id', 'contato_representante_representante_id_foreign')->references('id')->on('representantes');
		});

		Schema::table('documento_representante', function(Blueprint $table)
		{
			$table->foreign('documento_id', 'documento_representante_documento_id_foreign')->references('id')->on('documentos');
			$table->foreign('representante_id', 'documento_representante_representante_id_foreign')->references('id')->on('representantes');
		});

		Schema::table('empresa_representante', function(Blueprint $table)
		{
			$table->foreign('empresa_id', 'empresa_representante_empresa_id_foreign')->references('id')->on('empresas');
			$table->foreign('representante_id', 'empresa_representante_representante_id_foreign')->references('id')->on('representantes');
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
			$table->dropForeign('representantes_user_id_foreign');
		});

		Schema::table('contato_representante', function(Blueprint $table)
		{
			$table->dropForeign('contato_representante_contato_id_foreign');
			$table->dropForeign('contato_representante_representante_id_foreign');
		});

		Schema::table('documento_representante', function(Blueprint $table)
		{
			$table->dropForeign('documento_representante_documento_id_foreign');
			$table->dropForeign('documento_representante_representante_id_foreign');
		});

		Schema::table('empresa_representante', function(Blueprint $table)
		{
			$table->dropForeign('empresa_representante_empresa_id_foreign');
			$table->dropForeign('empresa_representante_representante_id_foreign');
		});

		Schema::drop('representantes');
		Schema::drop('contato_representante');
		Schema::drop('documento_representante');
		Schema::drop('empresa_representante');

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
