<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnVigenciaPaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('vigencia_pacientes', function(Blueprint $table)
		{
			$table->integer('anuidade_id')->nullable();

			$table->foreign('anuidade_id', 'vigencia_pacientes_anuidade_id_foreign')->references('id')->on('anuidades');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vigencia_pacientes', function(Blueprint $table) {
			$table->dropForeign('vigencia_pacientes_anuidade_id_foreign');
			$table->dropColumn('anuidade_id');
		});
    }
}
