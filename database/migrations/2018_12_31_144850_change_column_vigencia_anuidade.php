<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnVigenciaAnuidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('anuidades', function(Blueprint $table)
		{
			$table->date('data_inicio')->nullable()->change();
			$table->date('data_fim')->nullable()->change();
		});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('anuidades', function(Blueprint $table)
		{
			$table->date('data_inicio')->nullable(false)->change();
			$table->date('data_fim')->nullable(false)->change();
		});
    }
}
