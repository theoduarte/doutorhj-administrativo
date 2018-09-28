<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepresentanteRequest;
use App\Perfiluser;
use App\Representante;
use Illuminate\Http\Request;

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

		$model = new Representante($dados);
		$model->save();

		return redirect()->route($model->routeModel().'show', $model)->with('success', 'Registro adicionado');
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
		return view($model->routeModel().'modalShow', compact('model'));
	}

	/**
	 * Show the form for modal editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editModal($id)
	{
		$model = Representante::find($id);

		$perfilusers = Perfiluser::where('tipo_permissao', 5)->pluck('titulo', 'id');

		return view($model->routeModel().'modalEdit', compact('model', 'perfilusers'));
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

		$model->update($dados);

		return redirect()->route($model->routeModel().'show', $model)->with('success', 'Registro atualizado');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		try {
			$model = Representante::findOrFail($id);
			$model->delete();
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => 'Erro ao excluir o '.$model->entryName().$model->id,
			], 500);
		}
	}
}
