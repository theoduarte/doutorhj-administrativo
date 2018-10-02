<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
	public function getUserByCpf($cpf)
	{
		$cpfLimpo = UtilController::retiraMascara($cpf);

		$model = Documento::where(['tp_documento' => 'CPF', 'te_documento' => $cpfLimpo])->first();
		if(!is_null($model)) {

			$representante = $model->representantes->first();
			if(!is_null($representante)) {
				$contato = $representante->contatos->where('tp_contato', 'CP')->first();
				if(!is_null($contato)) {
					$pessoa = [
						'email' => $representante->user->email,
						'nm_primario' => $representante->nm_primario,
						'nm_secundario' => $representante->nm_secundario,
						'cs_sexo' => $representante->cs_sexo,
						'dt_nascimento' => $representante->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'user_id' => $representante->user_id,
					];

					return Response()->json(['status' => true, 'pessoa' => $pessoa]);
				}
			}

			$paciente = $model->pacientes->where('cs_status', 'A')->first();
			if(!is_null($paciente)) {
				$contato = $paciente->contatos->where('tp_contato', 'CP')->first();
				if(!is_null($contato)) {
					$pessoa = [
						'email' => $paciente->user->email,
						'nm_primario' => $paciente->nm_primario,
						'nm_secundario' => $paciente->nm_secundario,
						'cs_sexo' => $paciente->cs_sexo,
						'dt_nascimento' => $paciente->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'user_id' => $paciente->user_id,
					];

					return Response()->json(['status' => true, 'pessoa' => $pessoa]);
				}
			}

			$profissional = $model->profissionals->where('cs_status', 'A')->first();
			if(!is_null($profissional)) {
				$contato = $profissional->contatos->where('tp_contato', 'CP')->first();
				if(!is_null($contato)) {
					$pessoa = [
						'email' => $profissional->user->email,
						'nm_primario' => $profissional->nm_primario,
						'nm_secundario' => $profissional->nm_secundario,
						'cs_sexo' => $profissional->cs_sexo,
						'dt_nascimento' => $profissional->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'user_id' => $profissional->user_id,
					];

					return Response()->json(['status' => true, 'pessoa' => $pessoa]);
				}
			}
		}

		return Response()->json(['status' => false]);
	}
}
