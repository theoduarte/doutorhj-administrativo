<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Documento;
use App\Http\Requests\RepresentanteRequest;
use App\Perfiluser;
use App\Representante;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use League\Flysystem\Util;
use Illuminate\Support\Facades\Request as CVXRequest;

class RepresentanteController extends Controller
{
	/**
	 * Show the form for modal creating the specified resource.
	 *
	 * @param  int  $idRegra
	 * @return \Illuminate\Http\Response
	 */
	public function createModal($idEmpresa)
	{
		$model = new Representante();
		$model->empresa_id = $idEmpresa;

		$perfilusers = Perfiluser::where('tipo_permissao', 5)->pluck('titulo', 'id');

		return view('representantes.modalCreate', compact('model', 'perfilusers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  RepresentanteRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(RepresentanteRequest $request)
	{
		$dados = $request->all();

		DB::beginTransaction();
		try {
			$documento_obj = new DocumentoController();
			$user = $documento_obj->getUserByCpf($dados['cpf'])->getData();
			if(!$user->status) {
				if(User::where('email', 'ilike', $dados['email'])->where('cs_status', 'A')->first()) {
					DB::rollback();
					return response()->json([
						'message' => 'Email de usuário ja cadastrado.',
					], 403);
				}
				
				$user = new User();
				$user->name = strtoupper($dados['nm_primario'].' '.$dados['nm_secundario']);
				$user->email = $dados['email'];
				$user->password = bcrypt(uniqid('empresa@newSenha'));
				$user->tp_user = 'REP';
				$user->save();
			} else {
				$user = User::findOrFail($user->pessoa->user_id);
				if(empty($user->email)) {
					$user->email = $dados['email'];
					$user->save();
				}
			}

			$cpf = UtilController::retiraMascara($dados['cpf']);
			$documento = Documento::where(['tp_documento' => 'CPF', 'te_documento' => $cpf])->first();
			if(is_null($documento)) {
				$documento = new Documento();
				$documento->tp_documento = 'CPF';
				$documento->te_documento = $cpf;
				$documento->save();
			}

			$model = $documento->representantes->first();
			if(is_null($model)) {
				$model = new Representante($dados);
				$model->user_id = $user->id;
				$model->save();
			}

			$contato = Contato::where(['tp_contato' => 'CP', 'ds_contato' => $dados['telefone']])->first();
			if(is_null($contato)) {
				$contato = new Contato();
				$contato->tp_contato = 'CP';
				$contato->ds_contato = $dados['telefone'];
				$contato->save();
			}

			if($model->empresas->where('id', $dados['empresa_id'])->count() > 0) {
				DB::rollback();
				return response()->json([
					'message' => 'Representante já cadastrado nessa empresa',
				], 403);
			}

			if(!$model->documentos->contains($documento->id)) $model->documentos()->attach($documento->id);
			if(!$model->contatos->contains($contato->id)) $model->contatos()->attach($contato->id);
			$model->empresas()->attach($dados['empresa_id']);
		} catch (\Exception $e) {
			DB::rollback();
			report($e);
			return response()->json([
				'message' => 'Erro ao salvar o representante. Reinicie o navegador e tente novamente.',
			], 500);
		} catch (QueryException $e) {
			DB::rollback();
			report($e);
			return response()->json([
				'message' => 'Erro ao salvar o representante. Reinicie o navegador e tente novamente.',
			], 500);
		}

		DB::commit();
		return response()->json([
			'status' => true
		], 201);
	}

	/**
	 * Display the specified resource on modal.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showModal($id)
	{
		$model = Representante::findOrFail($id);
		return view('representantes.modalShow', compact('model'));
	}

	/**
	 * Show the form for modal editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editModal($id)
	{
		$model = Representante::findOrFail($id);

		$perfilusers = Perfiluser::where('tipo_permissao', 5)->pluck('titulo', 'id');

		return view('representantes.modalEdit', compact('model', 'perfilusers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  RepresentanteRequest $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(RepresentanteRequest $request, $id)
	{
		$model = Representante::find($id);
		$dados = $request->all();

		$model->perfiluser_id = $dados['perfiluser_id'];
		$model->save();

		return response()->json([
			'status' => true
		], 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$empresa_id = CVXRequest::post('empresa_id');
		try {
			$model = Representante::findOrFail($id);
			$model->empresas()->detach([$empresa_id]);
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => 'Erro ao excluir o '.$model->entryName().$model->id,
			], 500);
		}
	}
}
