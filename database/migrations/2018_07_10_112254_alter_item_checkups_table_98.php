<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterItemCheckupsTable98 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_checkups', function (Blueprint $table) {
            $table->dropColumn(['vl_mercado','ds_categoria','num_etapa','cs_status']);

            $table->text('ds_item')->nullable();
            $table->double('vl_net_checkup',8,2);
            $table->double('vl_com_checkup',8,2);
            $table->integer('num_etapa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_checkups', function (Blueprint $table) {
            $table->double('vl_mercado',8,2)->nullable();
            $table->text('ds_categoria')->nullable();
            $table->integer('num_etapa')->nullable();
            $table->string('cs_status',1)->nullable();
            $table->dropColumn(['ds_item','vl_net_checkup','vl_com_checkup','num_etapa']);
        });
    }
}
