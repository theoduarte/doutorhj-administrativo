<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Cidade;
use App\Endereco;
use App\Paciente;

/**
 * @author Frederico Cruz <frederico.cruz@s1saude.com.br>
 * 
 */
class PacienteController extends Controller
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
     * Método para mostrar a página de cadastro do paciente 
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        $arEstados       = \App\Estado::orderBy('ds_estado')->get();
        $arEspecialidade = \App\Especialidade::orderBy('ds_especialidade')->get();
        
        return view('paciente', ['arEstados' => $arEstados, 
                                 'arCargos'=> $arCargos, 
                                 'arEspecialidade'=>$arEspecialidade]);
    }
    
     
    /**
     * 
     * @param PacientesRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gravar(PacientesRequest $request){
        DB::beginTransaction();
        
        try{
            $usuario = new \App\User();
            $usuario->name = strtoupper($request->input('nm_primario').' '.$request->input('nm_secundario'));
            $usuario->email = $request->input('email');
            $usuario->password = bcrypt($request->input('password'));
            $usuario->tp_user = 'PAC';
            $usuario->save();  
            
            
            $documento = new \App\Documento($request->all());
            $documento->save();
            
            
            $endereco = new Endereco($request->all());
            $idCidade = Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            # telefones ---------------------------------------------
            $arContatos = array();
            
            $contato1 = new \App\Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2 = new \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            
            if(!empty($request->input('ds_contato3'))){
                $contato3 = new \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            $paciente  = new \App\Paciente($request->all());
            $paciente->users_id = $usuario->id;       
            $paciente->save();

            
            $paciente->contatos()->attach($arContatos);
            $paciente->enderecos()->attach([$endereco->id]);
            $paciente->documentos()->attach([$documento->id]);
            $paciente->save();
            
            DB::commit();
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        }catch (\Exception $e){
            DB::rollBack(); 
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarPacientesAtivos()
    {
    	return view('pacientes.pacientes_ativos');
    }
    
    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico.
     *
     */
    public function geraListaPacientesAtivosXls()
    {
    
    	Excel::create('DRHJ_RELATORIO_PACIENTES_ATIVOS_' . date('d-m-Y~H_i_s'), function ($excel) {
    		$excel->sheet('Consultas', function ($sheet) {
    
    			// Font family
    			$sheet->setFontFamily('Comic Sans MS');
    
    			// Set font with ->setStyle()`
    			$sheet->setStyle(array(
    					'font' => array(
    							'name' => 'Calibri',
    							'size' => 12,
    							'bold' => false
    					)
    			));
    			 
    			$cabecalho = array('Data' => date('d-m-Y H:i'));
    			 
    			$list_pacientes = Paciente::distinct()
    			->join('users',					function($join1) { $join1->on('pacientes.user_id', '=', 'users.id');})
    			->leftJoin('documento_paciente',	function($join2) { $join2->on('documento_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('documentos',			function($join3) { $join3->on('documentos.id', '=', 'documento_paciente.documento_id');})
    			->leftJoin('contato_paciente',		function($join4) { $join4->on('contato_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('contatos',				function($join5) { $join5->on('contatos.id', '=', 'contato_paciente.contato_id');})
    			->select('pacientes.id', 'pacientes.nm_primario as nome', 'pacientes.nm_secundario as sobrenome', 'pacientes.cs_sexo as genero', 'pacientes.dt_nascimento as data_nascimento', 'documentos.tp_documento as tipo_documento',
    					'documentos.te_documento as nr_documento', 'users.email', 'contatos.ds_contato as celular', 'pacientes.created_at as data_criacao_registro', 'pacientes.updated_at as data_ultimo_acesso', 'pacientes.responsavel_id')
    			->where(['pacientes.cs_status' => 'A'])
//     			->limit(10)
    			->orderby('pacientes.nm_primario', 'asc')
    			->get();
//     			dd($list_pacientes);
    
//     			$sheet->setColumnFormat(array(
//     					'F6:F'.(sizeof($list_consultas)+6) => '""00"." 000"."000"/"0000-00'
//     			));
    
    			$sheet->loadView('pacientes.pacientes_ativos_excel', compact('list_pacientes', 'cabecalho'));
    		});
    	})->export('xls');
    }
}
