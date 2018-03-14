<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tp_documento', 4)->nullable()->comment('TIPO DE DOCUMENTO. RG, CPF, CNPJ, CRM, CRN, CRF');
            $table->string('te_documento', 30)->nullable()->comment('NÚMERO DO DOCUMENTO');
            $table->integer('nr_serie')->nullable()->comment('NÚMERO DE SÉRIE DO DOCUMENTO SE EXISTIR');
            $table->timestamp('dt_expedicao')->nullable()->comment('DATA EM QUE O DOCUMENTO FOI EXPEDIDO');
            $table->timestamp('dt_validade')->nullable()->comment('DATA DE VALIDADE DO DOCUMENTO');
            $table->string('sg_orgao_expedidor', 10)->nullable()->comment('SIGLA DO ÓRGÃO QUE EMITIU O DOCUMENTO');
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
        Schema::dropIfExists('documentos');
    }
}
