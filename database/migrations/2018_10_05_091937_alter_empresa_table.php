<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpresaTable extends Migration
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
			$table->boolean('pre_autorizar')->default(false);
			$table->integer('resp_financeiro_id')->nullable();


			$table->foreign('resp_financeiro_id', 'empresas_resp_financeiro_id_foreign')->references('id')->on('representantes');
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
			$table->dropForeign('empresas_resp_financeiro_id_foreign');

			$table->dropColumn('pre_autorizar');
			$table->dropColumn('resp_financeiro_id');
		});
    }
}
