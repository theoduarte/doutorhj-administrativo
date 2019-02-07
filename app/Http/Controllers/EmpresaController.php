<?php

namespace App\Http\Controllers;

use App\Anuidade;
use App\Cidade;
use App\Contato;
use App\Empresa;
use App\Endereco;
use App\Estado;
use App\Http\Requests\EmpresaRequest;
use App\Plano;
use App\Repositories\FileRepository;
use App\TipoEmpresa;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Intervention\Image\File;

class EmpresaController extends Controller
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
		$empresas = Empresa::where(function($query) {
			if(!empty(Request::input('nm_busca'))){
				switch (Request::input('tp_filtro')){
					case "cd_plano" :
						$query->where('razao_social', 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
						break;
					case "ds_plano" :
						$query->where(DB::raw('to_str(nome_fantasia)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
						break;
					default:
						$query->where(DB::raw('to_str(razao_social)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%')
							->orWhere(DB::raw('to_str(nome_fantasia)'), 'ilike', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
				}
			}
		})->sortable(['nome_fantasia' => 'asc'])->paginate(10);

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
	 * @return \Illuminate\Http\Response
	 */
	public function store(EmpresaRequest $request, FileRepository $repo)
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

//			$contato1 = new Contato();
//			$contato1->tp_contato = 'CP';
//			$contato1->ds_contato = $request->input('contato_administrativo');
//			$contato1->save();
//			array_push($arContatos, $contato1->id);
//
//			$contato2 = new Contato();
//			$contato2->tp_contato = 'CF';
//			$contato2->ds_contato = $request->input('contato_financeiro');
//			$contato2->save();
//			array_push($arContatos, $contato2->id);

			$model = new Empresa($dados);
			$model->endereco_id = $endereco->id;
			$model->save();

			if($request->hasFile('logomarca')) {
				$logo_path = $repo->saveFile($request->logomarca, $model->id, 'empresas');
				$model->logomarca_path = URL::to("/storage/{$logo_path}");
				$model->save();
			}
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->route('empresas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		} catch(QueryException $e) {
			DB::rollback();
			return redirect()->route('empresas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		}

		DB::commit();

		return redirect()->route('empresas.edit', $model)->with('success', 'Registro adicionado');
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
		$model = Empresa::findOrFail($id);

		$tipoEmpresas = TipoEmpresa::pluck('descricao', 'id');
		$estados = Estado::orderBy('ds_estado')->get();
		$representantes = $model->representantes()->orderBy('nm_primario')->get();
		$planos = Plano::where('id', '<>', Plano::OPEN)->pluck('ds_plano', 'id');
		$colaboradores = $model->pacientes()->with(['user', 'contatos'])
			->where('cs_status', 'A')
			->whereNull('responsavel_id')
			->whereHas('user', function($query) {
				$query->where('cs_status', 'A');
			})
			->paginate(10, ['*'], 'colaboradores');

		$anuidades = $model->anuidades()
			->whereDate('data_inicio', '<=', date('Y-m-d'))
			->whereDate('data_fim', '>=', date('Y-m-d'));

		if($anuidades->count() == Plano::where('id', '<>', Plano::OPEN)->count())
			$anuidade_conf = null;
		elseif($model->anuidades()->count() == 0)
			$anuidade_conf = 'danger';
		else
			$anuidade_conf = 'warning';

		return view('empresas.edit', compact('model', 'tipoEmpresas', 'estados', 'representantes', 'planos', 'anuidade_conf', 'colaboradores'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(EmpresaRequest $request, $id, FileRepository $repo)
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
//			$contato1 = $model->contatos->where('tp_contato', 'CP')->first();
//			$contato1->ds_contato = $request->input('contato_administrativo');
//			$contato1->save();
//
//			$contato2 = $model->contatos->where('tp_contato', 'CF')->first();
//			$contato2->ds_contato = $request->input('contato_financeiro');
//			$contato2->save();

			$anuidades = $request->post('anuidades');
			if(count($anuidades) > 0) {
				foreach($anuidades as $planoId=>$anuidade) {
					if($anuidade['cs_status'] == 'A') {
						$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($anuidade['data_vigencia']);
					} else {
						$data_vigencia['de'] = date('Y-m-d');
						$data_vigencia['ate'] = date('Y-m-d');
					}

					$anuidade['data_inicio'] = $data_vigencia['de'];
					$anuidade['data_fim'] = $data_vigencia['ate'];
					$anuidade['empresa_id'] = $model->id;
					$anuidade['plano_id'] = $planoId;

					$modelAnuidade = Anuidade::where([
							'empresa_id' => $anuidade['empresa_id'],
							'plano_id' => $anuidade['plano_id'],
						])
						->whereNull('deleted_at');

					if ($modelAnuidade->count() > 0) {
						$oldAnuidade = $modelAnuidade->orderBy('id', 'DESC')->first();
						$modelAnuidade->update(['deleted_at' => date('Y/m/d H:i:s')]);
						$oldAnuidade = $oldAnuidade->orderBy('id', 'DESC')->first();
					} else {
						$oldAnuidade = null;
						$newAnuidade = new Anuidade($anuidade);
						$newAnuidade->save();
					}

					if (!is_null($oldAnuidade)) {
						$newAnuidade = $oldAnuidade->replicate();
						$newAnuidade->save();
						$newAnuidade->update($anuidade);
					}
				}
			}

			if($request->hasFile('logomarca')) {
				$logo_path = $repo->saveFile($request->logomarca, $model->id, 'empresas');
				$dados['logomarca_path'] = URL::to("/storage/{$logo_path}");
			}

			$model->update($dados);
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->route('empresas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
		} catch(QueryException $e) {
			DB::rollback();
			return redirect()->route('empresas.index')->with('error-alert', 'Erro ao cadastrar a empresa. Por favor, tente novamente.');
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
