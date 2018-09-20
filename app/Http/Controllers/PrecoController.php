<?php

namespace App\Http\Controllers;

use App\Preco;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PrecoController extends Controller
{
	//############# AJAX SERVICES ##################
	/**
	 * loadPrecoShow
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function loadPrecoShow($id)
	{
		$preco = Preco::findOrFail($id);

		if($preco->plano_id != null) {
			$preco->load('plano');
		}

		if($preco->tp_preco_id != null) {
			$preco->load('tipoPreco');
		}

		$preco->startDate = $preco->data_inicio->format('d/m/Y');
		$preco->endDate = $preco->data_fim->format('d/m/Y');

		return response()->json(['status' => true, 'preco' => $preco->toJson()]);
	}

	public function update(Request $request, $id)
	{
		$preco = Preco::findOrFail($id);

		$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($request->get('data-vigencia'));

		$preco->data_inicio = $data_vigencia['de'];
		$preco->data_fim = $data_vigencia['ate'];

		$preco->save();

		return redirect()->back()->with('success', 'A vigencia do preço foi salva com sucesso!');
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
			$model = Preco::findOrFail($id);
			$model->cs_status = 'I';
			$model->save();
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => 'Erro ao excluir o preço'.$model->id,
			], 500);
		}
	}
}
