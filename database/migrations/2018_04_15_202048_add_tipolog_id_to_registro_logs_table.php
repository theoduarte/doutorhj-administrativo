<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipologIdToRegistroLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_logs', function (Blueprint $table) {
            $table->integer('tipolog_id')
            ->unsigned()
            ->nullable()
            ->after('user_id');
            
            $table->foreign('tipolog_id')->references('id')->on('tipo_logs');
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
            $table->dropForeign('tipo_logs_user_id_foreign');
            $table->dropColumn('tipolog_id');
        });
    }
}
