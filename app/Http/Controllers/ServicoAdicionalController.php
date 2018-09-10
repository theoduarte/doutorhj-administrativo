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
    $model = new ServicoAdicional();
    return view('servico.create', compact('model'));
  }

  public function edit($id)
  {
    $model = ServicoAdicional::find($id);

    return view('servico.edit', compact('model'));
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
