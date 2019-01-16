<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocContTableFilial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('filials', function(Blueprint $table)
		{
			$table->string('cnpj', 18)->nullable();
			$table->string('inscricao_estadual', 20)->nullable();
			$table->string('inscricao_municipal', 20)->nullable();
		});

		Schema::create('contato_filial', function(Blueprint $table)
		{
			$table->integer('contato_id');
			$table->integer('filial_id');
			$table->primary(['contato_id','filial_id'], 'contato_filial_pkey');
		});

		Schema::table('contato_filial', function(Blueprint $table)
		{
			$table->foreign('contato_id', 'contato_filial_contato_id_foreign')->references('id')->on('contatos');
			$table->foreign('filial_id', 'contato_filial_filial_id_foreign')->references('id')->on('filials');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('contato_filial', function(Blueprint $table)
		{
			$table->dropForeign('contato_filial_contato_id_foreign');
			$table->dropForeign('contato_filial_filial_id_foreign');
		});

		Schema::table('filials', function(Blueprint $table)
		{
			$table->dropColumn('cnpj');
			$table->dropColumn('inscricao_estadual');
			$table->dropColumn('inscricao_municipal');
		});

		Schema::drop('contato_filial');
    }
}
