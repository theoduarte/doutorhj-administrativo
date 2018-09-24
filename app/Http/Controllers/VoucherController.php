<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Http\Requests\VoucherRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * VoucherController constructor.
     */
    public function index()
    {
        $get_term = CVXRequest::get('search_term');
        $search_term = UtilController::toStr($get_term);

        $vouchers = Voucher::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        return view('vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('vouchers.create');
    }

    public function store(VoucherRequest $request)
    {
        $dados = $request->all();

        $model = new Voucher($dados);
        $model->save();

        return redirect()->route('vouchers.show', $model)->with('success', 'Registro adicionado');
    }

    public function show($id)
    {
        $model = Voucher::findOrFail($id);

        return view('vouchers.show', compact('model'));
    }

    public function edit($id)
    {
        $model = Voucher::findOrFail($id);

        return view('vouchers.edit', compact('model'));
    }

    public function update(VoucherRequest $request, $id)
    {
        $model = Voucher::findOrFail($id);
        $dados = $request->all();

        $model->update($dados);

        return redirect()->route('vouchers.show', $model)->with('success', 'Registro atualizado');
    }

    public function destroy($id)
    {
        try {
            $model = Voucher::findOrFail($id);
            $model->delete();
        } catch(QueryException $e) {
            report($e);
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
