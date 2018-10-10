<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordReset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('password_resets', function (Blueprint $table) {
			$table->string('email')->index();
			$table->string('token');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('password_resets');
    }
}
