<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToRegistroLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_logs', function (Blueprint $table) {
            $table->integer('user_id')
            ->unsigned()
            ->nullable()
            ->after('ativo');
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro_logs', function (Blueprint $table) {
            $table->dropForeign('registro_logs_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
