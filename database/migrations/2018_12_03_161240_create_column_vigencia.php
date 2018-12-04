<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnVigencia extends Migration
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
			$table->string('periodicidade', 150)->default('isento');
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
			$table->dropColumn('periodicidade');
		});
    }
}
