<?php

namespace App\Http\Controllers;

use App\ServicoAdicional;
use App\Http\Requests\ServicoAdicionalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use App\Plano;

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
			$planos = Plano::pluck('ds_plano', 'id');
			return view('servico_adicionals.create', compact('planos'));
	}

	public function store(ServicoAdicionalRequest $request)
	{
			// dd($request->all()); //debug line
			$servico_adicionals = ServicoAdicional::create($request->all());
			$servico_adicionals->save();

			return redirect()->route('servico_adicionals.index')->with('success', 'O Serviço Adicional foi cadastrado com sucesso!');
	}

  public function edit($id)
  {
    $servico_adicionals = ServicoAdicional::find($id);

    return view('servico_adicionals.edit', compact('servico_adicionals'));
  }

	public function show($id)
	{
			$servico_adicionals = ServicoAdicional::findOrFail($id);

			return view('servico_adicionals.show', compact('servico_adicionals'));
	}

	public function update(ServicoAdicionalRequest $request, $id)
{
		$servico_adicionals = ServicoAdicional::findOrFail($id);
		$servico_adicionals->update($request->all());

		return redirect()->route('servico_adicionals.index')->with('success', 'O Serviço foi atualizado!');
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

		return redirect()->route('servico_adicionals.index')->with('success', 'O Serviço foi deletado!');
  }
}
