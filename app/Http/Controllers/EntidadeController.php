<?php

namespace App\Http\Controllers;

use App\Entidade;
use App\Http\Requests\EntidadesRequest;
use App\Repositories\FileRepository;
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
    return view('entidades.create');
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
// --------------------------------------_
/**
	 * Store a newly created resource in storage.
	 *
	 * @param  EntidadesRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(EntidadesRequest $request, FileRepository $repo)
 	{
 		$dados = $request->all();
 		// $dados['ativo'] = isset($dados['ativo']) && $dados['ativo'] ? true : false;

 		$model = new Entidade($dados);
 		$model->save();

 		$model->img_path = $repo->saveFile($request->imagem, $model->id, 'entidades');

 		$model->save();

 		// $model->formaPagamentos()->sync($dados['formapagamentos']);
 		// $model->consultors()->sync($dados['consultors']);

 		return redirect()->route('entidades.show', $model)->with('success', 'Registro adicionado');
 	}



	public function update(EntidadesRequest $request, $id, FileRepository $repo)
	{
		$model = Entidade::find($id);
		$dados = $request->all();

		// $dados['ativo'] = isset($dados['ativo']) && $dados['ativo'] ? true : false;

		$model->update($dados);

		if($request->hasFile('imagem'))
			$model->imgpath = $repo->saveFile($request->imagem, $model->id, 'entidades');

		$model->save();

		// $model->formaPagamentos()->sync($dados['formapagamentos']);
		// $model->consultors()->sync($dados['consultors']);

		return redirect()->route('entidades.show', $model)->with('success', 'Registro adicionado');
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
