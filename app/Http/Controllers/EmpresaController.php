<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Contato;
use App\Empresa;
use App\Endereco;
use App\Estado;
use App\Http\Requests\EmpresaRequest;
use App\Representante;
use App\TipoEmpresa;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
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
		$arContatos = [];
		$dados = $request->all();

		DB::beginTransaction();

		try {
			# endereco da empresa
			$endereco = new Endereco($dados);
			$cidade = Cidade::where(['cd_ibge' => $request->input('cd_cidade_ibge')])->get()->first();
			$endereco->nr_cep = UtilController::retiraMascara($request->input('nr_cep'));
			$endereco->cidade()->associate($cidade);
			$endereco->save();

			$contato1 = new Contato();
			$contato1->tp_contato = 'CA';
			$contato1->ds_contato = $request->input('contato_administrativo');
			$contato1->save();
			array_push($arContatos, $contato1->id);

			$contato2 = new Contato();
			$contato2->tp_contato = 'CF';
			$contato2->ds_contato = $request->input('contato_financeiro');
			$contato2->save();
			array_push($arContatos, $contato2->id);

			$model = new Empresa($dados);
			$model->endereco_id = $endereco->id;
			$model->save();

			$model->contatos()->sync($arContatos);
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->route('clinicas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		} catch(QueryException $e) {
			DB::rollback();
			return redirect()->route('clinicas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		}

		DB::commit();

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
		$estados = Estado::orderBy('ds_estado')->get();
		$representantes = $model->representantes()->orderBy('nm_primario')->get();

		return view('empresas.edit', compact('model', 'tipoEmpresas', 'estados', 'representantes'));
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

		DB::beginTransaction();

		try {
			$endereco = Endereco::findOrFail($model->endereco_id);
			$endereco->nr_cep = UtilController::retiraMascara($request->post('nr_cep'));
			$endereco->sg_logradouro = $request->post('sg_logradouro');
			$endereco->te_endereco = $request->post('te_endereco');
			$endereco->nr_logradouro = $request->post('nr_logradouro');
			$endereco->te_complemento = $request->post('te_complemento');
			$endereco->te_bairro = $request->post('te_bairro');

			$cidade = Cidade::where(['cd_ibge' => $request->post('cd_cidade_ibge')])->get()->first();
			$endereco->cidade()->associate($cidade);
			$endereco->save();

			//--salvar contatos----------------------
			$contato1 = $model->contatos->where('tp_contato', 'CA')->first();
			$contato1->ds_contato = $request->input('contato_administrativo');
			$contato1->save();

			$contato2 = $model->contatos->where('tp_contato', 'CF')->first();
			$contato2->ds_contato = $request->input('contato_financeiro');
			$contato2->save();

			$model->update($dados);
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->route('clinicas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		} catch(QueryException $e) {
			DB::rollback();
			return redirect()->route('clinicas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		}

		DB::commit();

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
