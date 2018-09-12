<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntidadesController extends Controller
{
	public function index()
	{
		$get_term = CVXRequest::get('search_term');
		$search_term = UtilController::toStr($get_term);

		$entidades = Entidade::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
		return view('entidades.index', compact('entidades'));
	}

	public function create()
	{
		$model = new Entidade();
    return view('entidade.create', compact('model'));
	}

	public function edit($id)
	{
		$model = Entidade::find($id);
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
	}
}
