<?php

use App\Contato;
use App\Empresa;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnContatoEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('empresas', function(Blueprint $table)
		{
			$table->string('contato_financeiro', 40)->nullable();
			$table->string('contato_administrativo', 40)->nullable();
		});

		$empresas = Empresa::get();

		foreach($empresas as $empresa) {
			$empresa->contato_financeiro = $empresa->contatos()->where('tp_contato', Contato::TP_FINANCEIRO)->first()->ds_contato;
			$empresa->contato_administrativo = $empresa->contatos()->where('tp_contato', Contato::TP_ADMINISTRATIVO)->first()->ds_contato;
			$empresa->save();
		}

		Schema::table('empresas', function(Blueprint $table)
		{
			$table->string('contato_financeiro', 40)->nullable(false)->change();
			$table->string('contato_administrativo', 40)->nullable(false)->change();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('empresas', function(Blueprint $table)
		{
			$table->dropColumn('contato_financeiro');
			$table->dropColumn('contato_administrativo');
		});
    }
}
