<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewStructurePlano extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('planos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cd_plano');
			$table->string('ds_plano', 150)->nullable();

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('tipo_planos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descricao', 150);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('entidades', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 150);
			$table->string('abreviacao', 50);
			$table->text('img_path')->nullable();

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('servico_adicionals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 150);
			$table->text('ds_servico')->nullable();
			$table->string('cs_status', 1);
			$table->integer('plano_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('vouchers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 100);
			$table->string('cd_voucher', 20);
			$table->text('ds_voucher')->nullable();
			$table->timestamp('prazo_utilizacao');
			$table->integer('tp_voucher_id');
			$table->integer('plano_id');
			$table->integer('paciente_id');
			$table->integer('campanha_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('campanhas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 200);
			$table->text('ds_campanha');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('precos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cd_preco')->nullable();
			$table->decimal('vl_comercial');
			$table->decimal('vl_net');
			$table->timestamp('data_inicio');
			$table->timestamp('data_fim');
			$table->integer('atendimento_id')->nullable();
			$table->integer('plano_id');
			$table->integer('itemcheckup_id')->nullable();
			$table->integer('tp_preco_id');
			$table->string('cs_status', 1);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('tipo_vouchers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descricao', 150);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('tipo_precos', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('descricao', 150);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('vigencia_pacientes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('data_inicio');
			$table->timestamp('data_fim');
			$table->boolean('cobertura_ativa');
			$table->float('vl_max_consumo');
			$table->integer('plano_id');
			$table->integer('paciente_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('empresas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome_fantasia', 250);
			$table->string('razao_social', 250);
			$table->bigInteger('cnpj');
			$table->bigInteger('inscricao')->nullable();
			$table->string('cs_status', 1)->default('A');
			$table->decimal('vl_max_empresa');
			$table->decimal('vl_max_funcionario');
			$table->float('anuidade')->nullable();
			$table->integer('desconto')->nullable();
			$table->integer('tp_empresa_id');
			$table->integer('endereco_id');
			$table->integer('matriz_id')->nullable;

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('tipo_cartaos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descricao', 150);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('tipo_empresas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('descricao', 250);
			$table->string('abreviacao', 10);

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('entidade_plano', function(Blueprint $table)
		{
			$table->integer('entidade_id');
			$table->integer('plano_id');
			$table->primary(['entidade_id','plano_id'], 'entidades_planos_pkey');
		});

		Schema::create('contato_empresa', function(Blueprint $table)
		{
			$table->integer('contato_id');
			$table->integer('empresa_id');

			$table->primary(['contato_id','empresa_id'], 'contatos_empresas_pkey');
		});

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

		Schema::create('campanha_clinica', function(Blueprint $table)
		{
			$table->integer('campanha_id');
			$table->integer('paciente_id');
			$table->primary(['campanha_id','paciente_id'], 'campanhas_clinicas_pkey');
		});

		Schema::create('plano_tipoplano', function(Blueprint $table)
		{
			$table->integer('tipo_plano_id');
			$table->integer('plano_id');
			$table->primary(['tipo_plano_id','plano_id'], 'planos_tipoplanos_pkey');
		});

		Schema::table('pacientes', function(Blueprint $table)
		{
			$table->addColumn('integer', 'empresa_id')->nullable();
			$table->string('mundipagg_token', 250)->nullable();
			$table->foreign('empresa_id', 'pacientes_empresa_id_foreign')->references('id')->on('empresas');
		});

		Schema::table('cartao_pacientes', function(Blueprint $table)
		{
			$table->addColumn('integer', 'empresa_id')->nullable();
			$table->addColumn('integer', 'tp_cartao_id')->nullable();
			$table->foreign('empresa_id', 'cartao_pacientes_empresa_id_foreign')->references('id')->on('empresas');
			$table->foreign('tp_cartao_id', 'cartao_pacientes_tp_cartao_id_foreign')->references('id')->on('tipo_cartaos');
		});

		Schema::table('empresas', function(Blueprint $table)
		{
			$table->foreign('tp_empresa_id', 'empresas_tp_empresa_id_foreign')->references('id')->on('tipo_empresas');
			$table->foreign('endereco_id', 'empresas_endereco_id_foreign')->references('id')->on('enderecos');
			$table->foreign('matriz_id', 'empresas_matriz_id_foreign')->references('id')->on('empresas');
		});

		Schema::table('vigencia_pacientes', function(Blueprint $table)
		{
			$table->foreign('plano_id', 'vigencia_pacientes_plano_id_foreign')->references('id')->on('planos');
			$table->foreign('paciente_id', 'vigencia_pacientes_paciente_id_foreign')->references('id')->on('pacientes');
		});

		Schema::table('servico_adicionals', function(Blueprint $table)
		{
			$table->foreign('plano_id', 'servico_adicionals_plano_id_foreign')->references('id')->on('planos');
		});

		Schema::table('vouchers', function(Blueprint $table)
		{
			$table->foreign('tp_voucher_id', 'vouchers_tp_voucher_id_foreign')->references('id')->on('tipo_vouchers');
			$table->foreign('plano_id', 'vouchers_plano_id_foreign')->references('id')->on('planos');
			$table->foreign('paciente_id', 'vouchers_paciente_id_foreign')->references('id')->on('pacientes');
			$table->foreign('campanha_id', 'vouchers_campanha_id_foreign')->references('id')->on('campanhas');
		});

		Schema::table('precos', function(Blueprint $table)
		{
			$table->foreign('atendimento_id', 'precos_atendimento_id_foreign')->references('id')->on('atendimentos');
			$table->foreign('plano_id', 'precos_plano_id_foreign')->references('id')->on('planos');
			$table->foreign('itemcheckup_id', 'precos_itemcheckup_id_foreign')->references('id')->on('item_checkups');
			$table->foreign('tp_preco_id', 'precos_tp_preco_id_foreign')->references('id')->on('tipo_precos');
		});

		Schema::table('entidade_plano', function(Blueprint $table)
		{
			$table->foreign('entidade_id', 'entidade_plano_entidade_id_foreign')->references('id')->on('entidades');
			$table->foreign('plano_id', 'entidade_plano_id_foreign')->references('id')->on('planos');
		});

		Schema::table('contato_empresa', function(Blueprint $table)
		{
			$table->foreign('contato_id', 'contato_empresa_contato_id_foreign')->references('id')->on('contatos');
			$table->foreign('empresa_id', 'contato_empresa_empresa_id_foreign')->references('id')->on('empresas');
		});

		Schema::table('empresa_user', function(Blueprint $table)
		{
			$table->foreign('empresa_id', 'empresa_user_empresa_id_foreign')->references('id')->on('empresas');
			$table->foreign('user_id', 'empresa_user_contato_id_foreign')->references('id')->on('users');
		});

		Schema::table('plano_tipoplano', function(Blueprint $table)
		{
			$table->foreign('tipo_plano_id', 'plano_tipoplano_tipo_plano_id_foreign')->references('id')->on('tipo_planos');
			$table->foreign('plano_id', 'plano_tipoplano_plano_id_foreign')->references('id')->on('planos');
		});

		Schema::table('campanha_clinica', function(Blueprint $table)
		{
			$table->foreign('campanha_id', 'campanha_clinica_campanha_id_foreign')->references('id')->on('campanhas');
			$table->foreign('paciente_id', 'campanha_clinica_paciente_id_foreign')->references('id')->on('pacientes');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('vigencia_pacientes', function(Blueprint $table)
		{
			$table->dropForeign('vigencia_pacientes_plano_id_foreign');
			$table->dropForeign('vigencia_pacientes_paciente_id_foreign');
		});

		Schema::table('servico_adicionals', function(Blueprint $table)
		{
			$table->dropForeign('servico_adicionals_plano_id_foreign');
		});

		Schema::table('vouchers', function(Blueprint $table)
		{
			$table->dropForeign('vouchers_tp_voucher_id_foreign');
			$table->dropForeign('vouchers_plano_id_foreign');
			$table->dropForeign('vouchers_paciente_id_foreign');
			$table->dropForeign('vouchers_campanha_id_foreign');
		});

		Schema::table('precos', function(Blueprint $table)
		{
			$table->dropForeign('precos_atendimento_id_foreign');
			$table->dropForeign('precos_plano_id_foreign');
			$table->dropForeign('precos_itemcheckup_id_foreign');
			$table->dropForeign('precos_tp_preco_id_foreign');
		});

		Schema::table('entidade_plano', function(Blueprint $table)
		{
			$table->dropForeign('entidade_plano_entidade_id_foreign');
			$table->dropForeign('entidade_plano_id_foreign');
		});

		Schema::table('empresas', function(Blueprint $table)
		{
			$table->dropForeign('empresas_tp_empresa_id_foreign');
			$table->dropForeign('empresas_endereco_id_foreign');
			$table->dropForeign('empresas_matriz_id_foreign');
		});

		Schema::table('contato_empresa', function(Blueprint $table)
		{
			$table->dropForeign('contato_empresa_contato_id_foreign');
			$table->dropForeign('contato_empresa_empresa_id_foreignc');
		});

		Schema::table('empresa_user', function(Blueprint $table)
		{
			$table->dropForeign('empresa_user_empresa_id_foreign');
			$table->dropForeign('empresa_user_contato_id_foreign');
		});

		Schema::table('plano_tipoplano', function(Blueprint $table)
		{
			$table->dropForeign('plano_tipoplano_tipo_plano_id_foreign');
			$table->dropForeign('plano_tipoplano_plano_id_foreign');
		});

		Schema::table('campanha_clinica', function(Blueprint $table)
		{
			$table->dropForeign('campanha_clinica_campanha_id_foreign');
			$table->dropForeign('campanha_clinica_paciente_id_foreign');
		});

		Schema::table('pacientes', function(Blueprint $table)
		{
			$table->dropForeign('pacientes_empresa_id_foreign');
			$table->dropColumn('empresa_id');
			$table->dropColumn('mundipagg_token');
		});

		Schema::table('cartao_pacientes', function(Blueprint $table)
		{
			$table->dropForeign('cartao_pacientes_empresa_id_foreign');
			$table->dropForeign('cartao_pacientes_tp_cartao_id_foreign');
			$table->dropColumn('empresa_id');
			$table->dropColumn('tp_cartao_id');
		});

		Schema::drop('planos');
		Schema::drop('tipo_planos');
		Schema::drop('entidades');
		Schema::drop('servico_adicionals');
		Schema::drop('vouchers');
		Schema::drop('campanhas');
		Schema::drop('precos');
		Schema::drop('tipo_vouchers');
		Schema::drop('tipo_precos');
		Schema::drop('vigencia_pacientes');
		Schema::drop('entidade_plano');
		Schema::drop('campanha_clinica');
		Schema::drop('plano_tipoplano');
		Schema::drop('empresas');
		Schema::drop('tipo_cartaos');
		Schema::drop('tipo_empresas');
		Schema::drop('contato_empresa');
		Schema::drop('empresa_user');
    }
}