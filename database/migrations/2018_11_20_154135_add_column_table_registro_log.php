<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableRegistroLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('registro_logs', function(Blueprint $table)
		{
			$table->string('table_name', 250)->nullable();
			$table->integer('field_id')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('registro_logs', function(Blueprint $table)
		{
			$table->dropColumn('table_name');
			$table->dropColumn('field_id');
		});
    }
}
