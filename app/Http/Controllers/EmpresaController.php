<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Estado;
use App\TipoEmpresa;
use Illuminate\Support\Facades\Request;

class EmpresaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$empresas = Empresa::where(function($query) {
			if(!empty(Request::input('nm_busca'))){
				switch (Request::input('tp_filtro')){
					case "cd_plano" :
						$query->where('cd_plano', 'ilike', '%'.UtilController::toStr(Request::input('cd_plano')).'%');
						break;
					case "ds_plano" :
						$query->where(DB::raw('to_str(ds_plano)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
						break;
					default:
						$query->where(DB::raw('to_str(ds_plano)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
				}
			}
		})->sortable()->paginate(10);

		Request::flash();

		return view('empresas.index', compact('empresas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$model = new Empresa();

		$tipoEmpresas = TipoEmpresa::pluck('descricao', 'id');
		$estados = Estado::orderBy('ds_estado')->get();

		return view('empresas.create', compact('model', 'tipoEmpresas', 'estados'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CarenciaRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(EmpresaRequest $request)
	{
		$dados = $request->all();

		$model = new Empresa($dados);
		$model->save();

		$model->tipoEmpresas()->sync($dados['tipoEmpresas']);

		return redirect()->route('empresas.show', $model)->with('success', 'Registro adicionado');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$model = Empresa::findOrFail($id);
		return view('empresas.show', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$model = Empresa::find($id);

		$tipoEmpresas = TipoEmpresa::pluck('descricao', 'id');

		return view('empresas.edit', compact('model', 'tipoEmpresas'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  CarenciaRequest $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(EmpresaRequest $request, $id)
	{
		$model = Empresa::findOrFail($id);
		$dados = $request->all();

		$model->update($dados);

		$model->tipoEmpresas()->sync($dados['tipoEmpresas']);

		return redirect()->route('empresas.show', $model)->with('success', 'Registro atualizado');
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
			$model = Empresa::findOrFail($id);
			$model->delete();
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => $e->getMessage(),
			], 500);
		}
	}
}
