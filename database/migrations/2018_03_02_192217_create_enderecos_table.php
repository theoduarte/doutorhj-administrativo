<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sg_logradouro', 10)->nullable();
            $table->string('te_endereco', 250)->nullable();
            $table->string('nr_logradouro', 10)->nullable();
            $table->string('te_bairro', 30)->nullable();
            $table->string('nr_cep', 9)->nullable();
            $table->text('te_complemento_logradouro')->nullable();
            $table->float('nr_latitude_gps', 8, 2)->default(0.0);
            $table->float('nr_longitute_gps', 8, 2)->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
