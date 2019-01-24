<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCorretorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nm_primario', 50);
            $table->string('nm_secundario', 100);
            $table->date('dt_nascimento')->nullable()->comment('DATA DE NASCIMENTO');
            $table->string('email', 150);
            $table->char('cs_status', 1)->nullable('A')->comment('A=>Ativo I=>Inativo');
            $table->timestamp('created_at')->default(DB::raw('NOW()'));
            $table->timestamp('updated_at')->default(DB::raw('NOW()'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corretors');
    }
}
