<?php

use App\Representante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEmailRepresentantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('representantes', function(Blueprint $table)
		{
			$table->string('email', 250)->nullable();
		});

		Representante::join('users', 'users.id', '=', 'representantes.user_id')
			->update(['email' => DB::raw("users.email")]);

		Schema::table('representantes', function(Blueprint $table)
		{
			$table->string('email', 250)->nullable(false)->change();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('representantes', function(Blueprint $table)
		{
			$table->dropColumn('email');
		});
    }
}
