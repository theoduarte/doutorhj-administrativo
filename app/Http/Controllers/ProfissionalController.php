<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProfissionaisEditRequest;
use App\Profissional;
use App\User;
use App\Especialidade;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionals = Profissional::WhereHas(
                                                'documentos', function($query){
                                                    if(!empty(Request::get('nm_busca'))){
                                                        if( Request::get('tp_filtro') == 'registro' ){
                                                            $query->where('te_documento', Request::get('nm_busca'));
                                                        }
                                                    }
                                                }
                                            )->where(
                                                function($query){
                                                    if(!empty(Request::get('nm_busca'))){
                                                        if( Request::get('tp_filtro') == 'nome' ){
                                                            $query->where(DB::raw('concat(to_str(nm_primario), to_str(nm_secundario))'), 
                                                                        'like', '%'.UtilController::toStr(Request::get('nm_busca'), true).'%');
                        
                                                        }
                                                    }
                                                }
                                            )->sortable()
                                             ->paginate(20);

       
        $profissionals->load('documentos');
        $profissionals->load('especialidades');
                                            
        Request::flash();
        
        return view('profissionals.index', compact('profissionals'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissionals.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = User::create($request->all());
        
        return redirect()->route('profissionals.index')->with('success', 'O Profissional cadastrado com sucesso!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $idProfissional
     * @return \Illuminate\Http\Response
     */
    public function show($idProfissional)
    {
        $profissionals = Profissional::findorfail($idProfissional);
        $profissionals->load('documentos');
        $profissionals->load('especialidades');

        return view('profissionals.show', compact('profissionals'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProfissional)
    {
        $arEspecialidade = Especialidade::all();
        
        $profissionals = Profissional::findorfail($idProfissional);
        $profissionals->load('documentos');
        $profissionals->load('especialidades');
        
        return view('profissionals.edit', compact('profissionals', 'arEspecialidade'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfissionaisEditRequest $request, $idProfissional)
    {
        $dados = Request::all();
        
        $profissional = Profissional::findorfail($idProfissional);
        $ct_profissional = $profissional;
        $profissional->update($dados);
        $profissional->documentos()->update(['tp_documento'=>$dados['tp_documento'], 'te_documento'=>$dados['te_documento']]);
        
        if(!empty($dados['especialidade'])) {
            $profissional->especialidades()->sync($dados['especialidade']);
        }
        
        ####################################### registra log> #######################################
        $ct_profissional_obj    = $ct_profissional->toJson();
        $profissional_obj       = $profissional->toJson();
        
        $titulo_log = 'Editar Profissional';
        $ct_log   = '"reg_anterior":'.'{"profissional":'.$ct_profissional_obj.'}';
        $new_log  = '"reg_novo":'.'{"profissional":'.$profissional_obj.'}';
        $tipo_log = 3;
        
        $log = "{".$ct_log.",".$new_log."}";
        
        $reglog = new RegistroLogController();
        $reglog->registrarLog($titulo_log, $log, $tipo_log);
        ####################################### </registra log #######################################
        
        return redirect()->route('profissionals.index')->with('success', 'O Profissional foi atualizado com sucesso!');
    }
    
    /**
     * Consulta profissionais atrelados a uma clínica.
     *
     * @param integer $idClinica
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfissionaisPorClinica($idClinica){
        
        $profissional = Profissional::where('clinica_id', '=', $idClinica)->where('cs_status', 'A')->orderBy('nm_primario', 'asc')->get(['id', 'nm_primario', 'nm_secundario']);
        
        return Response()->json($profissional);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProfissional)
    {

        
        return redirect()->route('profissionals.index')->with('success', 'Profissional inativado com sucesso!');
    }
}