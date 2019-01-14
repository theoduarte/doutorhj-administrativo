<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClinicasAddPrecadastro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('clinicas', function(Blueprint $table)
		{
			$table->boolean('pre_cadastro')->default(false);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('clinicas', function(Blueprint $table)
		{
			$table->dropColumn('pre_cadastro');
		});
    }
}
