<?php

use App\Contato;
use App\Empresa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableContatoEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('contato_empresa', function(Blueprint $table)
		{
			$table->dropForeign('contato_empresa_contato_id_foreign');
			$table->dropForeign('contato_empresa_empresa_id_foreign');
		});

		Schema::dropIfExists('contato_empresa');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::create('contato_empresa', function(Blueprint $table)
		{
			$table->integer('contato_id');
			$table->integer('empresa_id');

			$table->primary(['contato_id','empresa_id'], 'contatos_empresas_pkey');
		});

		Schema::table('contato_empresa', function(Blueprint $table)
		{
			$table->foreign('contato_id', 'contato_empresa_contato_id_foreign')->references('id')->on('contatos');
			$table->foreign('empresa_id', 'contato_empresa_empresa_id_foreign')->references('id')->on('empresas');
		});
    }
}
