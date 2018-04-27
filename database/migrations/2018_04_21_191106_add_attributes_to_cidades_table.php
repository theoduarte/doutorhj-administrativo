<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesToCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('cidades', function (Blueprint $table) {
    		$table->string('nr_cep', 9)->nullable()->after('sg_estado');
    		$table->string('tp_localidade', 2)->nullable()->after('nr_cep');
    		$table->float('latitude', 10)->nullable()->after('tp_localidade');
    		$table->float('longitude', 10)->nullable()->after('latitude');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('cidades', function (Blueprint $table) {
    		$table->dropColumn('nr_cep');
    		$table->dropColumn('tp_localidade');
    		$table->dropColumn('latitude');
    		$table->dropColumn('longitude');
    	});
    }
}
