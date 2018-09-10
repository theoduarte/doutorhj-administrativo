<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoAdicionalRequest;
use App\ServicoAdicional;
use Illuminate\Http\Request;

class ServicoAdicionalController extends Controller
{

  public function index()
  {
    $servico = ServicoAdicional::sortable()->paginate(10);
    return view('servico.index', compact('servico'))
  }

  public function create()
  {
    $model = new ServicoAdicional();
    return view('servico.create', compact('model'));
  }

  public function edit($id)
  {
    $model = ServicoAdicional::find($id);

    return view('servico.edit', compact('model'))
  }

  public function destroy($id)
  {
    try {
      $model = ServicoAdicional::findOrFail($id);
      $model->delete();
    } catch(QueryException $e) {
      report($e);
      return response()->json([
        'message' => $e->getMessage(),
      ], 500);
    }
  }
}
