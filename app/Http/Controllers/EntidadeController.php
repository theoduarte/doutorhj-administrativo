<?php

namespace App\Http\Controllers;

use App\Entidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\EntidadesRequest;
// use Illuminate\Support\Facades\Request as CVXRequest;

class EntidadeController extends Controller
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
		// $get_term = CVXRequest::get('search_term');
		// $search_term = UtilController::toStr($get_term);

		// $entidades = Entidade::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
		return view('entidades.index');
	}

	public function create()
	{
		$model = new Entidade();
    return view('entidade.create', compact('model'));
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
	public function update(Request $request, $id)
	{
			//
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
