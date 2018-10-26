<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanoRequest;
use App\Plano;
use App\TipoPlano;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class PlanoController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$planos = Plano::where(function($query){
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

		$tipoPlanos = TipoPlano::pluck('descricao', 'id');

		return view('planos.create', compact('model', 'tipoPlanos'));
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

		$model = new Plano($dados);
		$model->save();

		$model->tipoPlanos()->sync($dados['tipoPlanos']);

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

		$tipoPlanos = TipoPlano::pluck('descricao', 'id');

		return view('planos.edit', compact('model', 'tipoPlanos'));
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

		$model->update($dados);

		$model->tipoPlanos()->sync($dados['tipoPlanos']);

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
