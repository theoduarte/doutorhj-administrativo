<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCheckupsDropColumnsVl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->dropColumn('vl_total_com');
            $table->dropColumn('vl_total_net');
            $table->text('ds_checkup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->double('vl_total_com',8,2)->nullable();
            $table->double('vl_total_net',8,2)->nullable();
            $table->dropColumn('ds_checkup');
        });
    }
}
