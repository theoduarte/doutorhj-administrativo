<?php

namespace App\Http\Controllers;

use App\Entidade;
use App\Http\Requests\EntidadesRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class EntidadeController extends Controller
{
	public function index()
	{
		$entidades = Entidade::where(function($query){
			if(!empty(Request::input('nm_busca'))){
				switch (Request::input('tp_filtro')){
					case "titulo":
						$query->where('titulo', 'ilike', '%'.UtilController::toStr(Request::input('titulo')).'%');
						break;
					case "abreviacao":
						$query->where(DB::raw('to_str(abreviacao)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
						break;
					default:
						$query->where(DB::raw('to_str(titulo)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
				}
			}
		})->sortable()->paginate(10);

		Request::flash();

		return view('entidades.index', compact('entidades'));
	}

	public function create()
	{
		$model = new Entidade();
    return view('entidades.create', compact('model'));
	}

	public function store(EntidadesRequest $request)
	{
		$model = Entidade::create($request->all());
		$model->save();

		return redirect()->route('entidades.index')->with('success', 'A Entidade foi cadastrada com sucesso!');
	}

	public function show($id)
	{
		$model = Entidade::findOrfail($id);

		return view('entidades.show', compact('model'));
	}

	public function edit($id)
	{
		$model = Entidade::find($id);

		return view('entidades.edit', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(EntidadesRequest $request, $id)
	{
		$model = Entidade::findOrFail($id);
		$dados = $request->all();

		$model->update($dados);

		return redirect()->route('entidades.index')->with('success', 'A Entidade foi Atualizada!');
	}


	public function destroy($id)
	{
		try {
			$model = Entidade::findOrFail($id);
			$model->delete();
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => $e->getMessage(),
			], 500);
		}
		return redirect()->route('entidades.index')->with('success', 'Entidade deletada!');
	}
}
