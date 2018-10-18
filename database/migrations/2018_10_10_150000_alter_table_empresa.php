<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableEmpresa extends Migration
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
			$table->string('mundipagg_token', 250)->nullable();
			$table->string('logomarca_path', 400)->nullable();
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
			$table->dropColumn('mundipagg_token');
			$table->dropColumn('logomarca_path');
		});
    }
}
