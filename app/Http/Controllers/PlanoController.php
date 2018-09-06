<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanoRequest;
use App\Plano;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$planos = Plano::sortable()->paginate(10);;
		return view('planos.index', compact('planos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$model = new Plano();

		return view('planos.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CarenciaRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PlanoRequest $request)
	{
		$dados = $request->all();

		$dados['cs_status'] = isset($dados['cs_status']) && $dados['cs_status'] ? 'A' : 'I';

		$model = new Plano($dados);
		$model->save();

		return redirect()->route('planos.show', $model)->with('success', 'Registro adicionado');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$model = Plano::findOrFail($id);
		return view('planos.show', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$model = Plano::find($id);

		return view('planos.edit', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  CarenciaRequest $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(PlanoRequest $request, $id)
	{
		$model = Plano::findOrFail($id);
		$dados = $request->all();

		$dados['cs_status'] = isset($dados['cs_status']) && $dados['cs_status'] ? 'A' : 'I';

		$model->update($dados);

		return redirect()->route('planos.show', $model)->with('success', 'Registro atualizado');
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
			$model = Plano::findOrFail($id);
			$model->delete();
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => $e->getMessage(),
			], 500);
		}
	}
}
