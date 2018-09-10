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
			$table->float('anuidade');

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
			$table->boolean('cs_status');
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
			$table->integer('atendimento_id');
			$table->integer('plano_id');
			$table->integer('itemcheckup_id');
			$table->integer('tp_preco_id');
			$table->boolean('cs_status');

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
			$table->boolean('cobertura');
			$table->integer('plano_id');
			$table->integer('paciente_id');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});

		Schema::create('entidade_plano', function(Blueprint $table)
		{
			$table->integer('entidade_id');
			$table->integer('plano_id');
			$table->primary(['entidade_id','plano_id'], 'entidades_planos_pkey');
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
    }
}