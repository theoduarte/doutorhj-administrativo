<?php

use App\Paciente;
use App\VigenciaPaciente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertVigenciasForAllDependentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		$dependentes = Paciente::whereNotNull('responsavel_id')->get();

		foreach($dependentes as $dependente) {
			$responsavel = $dependente->responsavel;
			
			if(!is_null($responsavel->vigencia_ativa)) {
				$vigencia = $responsavel->vigencia_ativa->replicate();
				$vigencia->paciente_id = $dependente->id;
				$vigencia->saveOrFail();
			} else {
				Log::debug('Não localizada vigencia do Responsável', ['dependente' => $dependente->toArray(), $responsavel->toArray()]);
			}
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
