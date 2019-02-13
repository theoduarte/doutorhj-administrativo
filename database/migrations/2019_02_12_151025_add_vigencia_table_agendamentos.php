<?php

use App\Agendamento;
use App\VigenciaPaciente;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVigenciaTableAgendamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('agendamentos', function (Blueprint $table) {
			$table->integer('vigencia_paciente_id')->nullable()->after('atendimento_id');

			$table->foreign('vigencia_paciente_id', 'agendamentos_vigencia_id_foreign')->references('id')->on('vigencia_pacientes');
		});

		$agendamentos = Agendamento::get();

		foreach($agendamentos as $agendamento) {
			$vigenciaPac = VigenciaPaciente::where(['paciente_id' => $agendamento->paciente_id])
				->where(function($query) {
					$query->whereDate('data_inicio', '<=', date('Y-m-d H:i:s'))
						->whereDate('data_fim', '>=', date('Y-m-d H:i:s'))
						->orWhere(DB::raw('cobertura_ativa'), '=', true);
				})
				->orderBy('id', 'DESC')
				->first();

			if(!is_null($vigenciaPac)) {
				$agendamento->vigencia_paciente_id = $vigenciaPac->id;
				$agendamento->save();
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
		Schema::table('agendamentos', function (Blueprint $table) {
			$table->dropForeign('agendamentos_vigencia_id_foreign');
			$table->dropColumn('vigencia_paciente_id');
		});
    }
}
