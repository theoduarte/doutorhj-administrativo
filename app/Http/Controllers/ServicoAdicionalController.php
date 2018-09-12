<?php

namespace App\Http\Controllers;

use App\ServicoAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class ServicoAdicionalController extends Controller
{

  public function index()
  {
    $get_term = CVXRequest::get('search_term');
    $search_term = UtilController::toStr($get_term);

    $servico_adicionals = ServicoAdicional::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    return view('servico_adicionals.index', compact('servico_adicionals'));
  }

	public function create()
	{
			return view('servico_adicionals.create');
	}

	public function store(Request $request)
	{
			$servico_adicionals = ServicoAdicional::create($request->all());
			$servico_adicionals->save();

			return redirect()->route('servico_adicionals.index')->with('success', 'O Serviço Adicional foi cadastrado com sucesso!');
	}

  public function edit($id)
  {
    $servico_adicionals = ServicoAdicional::find($id);

    return view('servico_adicionals.edit', compact('servico_adicionals'));
  }

	public function update(Request $request, $id)
{
		$servico_adicionals = ServicoAdicional::findOrFail($id);
		$servico_adicionals->update($request->all());

		return redirect()->route('servico_adicionals.index')->with('success', 'O Serviço Adicional foi editado com sucesso!');
}

  public function destroy($id)
  {
    try {
      $servico_adicionals = ServicoAdicional::findOrFail($id);
      $servico_adicionals->delete();
    } catch(QueryException $e) {
      report($e);
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }
}