<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DocumentoController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $action = Route::current();
            $action_name = $action->action['as'];
            
            $this->middleware("cvx:$action_name");
        } catch (\Exception $e) {}
    }
    
    /**
     * Busca o usuário pelo CPF.
     *
     * @return \Illuminate\Http\Response
     */
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
						'email_corporativo' => $representante->email,
						'nm_primario' => $representante->nm_primario,
						'nm_secundario' => $representante->nm_secundario,
						'cs_sexo' => $representante->cs_sexo,
						'dt_nascimento' => $representante->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'documento_id' => $model->id,
						'contato_id' => $contato->id,
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
						'email_corporativo' => '',
						'nm_primario' => $paciente->nm_primario,
						'nm_secundario' => $paciente->nm_secundario,
						'cs_sexo' => $paciente->cs_sexo,
						'dt_nascimento' => $paciente->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'documento_id' => $model->id,
						'contato_id' => $contato->id,
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
						'email_corporativo' => '',
						'nm_primario' => $profissional->nm_primario,
						'nm_secundario' => $profissional->nm_secundario,
						'cs_sexo' => $profissional->cs_sexo,
						'dt_nascimento' => $profissional->dt_nascimento,
						'telefone' => $contato->ds_contato,
						'documento_id' => $model->id,
						'contato_id' => $contato->id,
						'user_id' => $profissional->user_id,
					];

					return Response()->json(['status' => true, 'pessoa' => $pessoa]);
				}
			}
		}

		return Response()->json(['status' => false]);
	}
}
