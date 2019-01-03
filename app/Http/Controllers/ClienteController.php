<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\RegistroLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\PacientesEditRequest;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Estado;
use App\Especialidade;

class ClienteController extends Controller
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
        $pacientes = \App\Paciente::where( function($query) {
            if( !empty(Request::input('nm_busca')) ) {
                switch (Request::input('tp_filtro')){
                    case "nome" :
                        $query->where(DB::raw('to_str(nm_primario)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                        break;
                    case "email" :
                        $query->whereExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('users')
                                ->whereRaw('pacientes.user_id = users.id')
                                ->where(DB::raw('to_str(email)'), '=', UtilController::toStr(Request::input('nm_busca')));
                        });
                        break;
                    default :
                        $query->where(DB::raw('to_str(nm_primario)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                }
            }
            
            $arFiltroStatusIn = array();
//            if( !empty(Request::input('tp_usuario_somente_ativos')) ) {
                $arFiltroStatusIn[] = \App\User::ATIVO; 
//            }

//            if( !empty(Request::input('tp_usuario_somente_inativos'))) {
//                $arFiltroStatusIn[] = \App\User::INATIVO;
//            }

            if( count($arFiltroStatusIn) > 0 ) { 
                $query->whereExists(function ($query) use ($arFiltroStatusIn) {
                    $query->select(DB::raw(1))
                        ->from('users')
                        ->whereRaw('pacientes.user_id = users.id')
                        ->where('users.cs_status', $arFiltroStatusIn);
                });

                // $query->whereHas( 'user', function($query){
                //     $query->whereIn('user.cs_status', $arFiltroStatusIn); 
                // });
                
            }

        })->sortable()
        ->paginate(20);

        // $pacientes->load('user');
        // $pacientes->load('documentos');

        Request::flash();
        
        return view('clientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
        
        $request->session()->flash('message', 'Cargo cadastrado com sucesso!');
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
            $arEstados       = Estado::orderBy('ds_estado')->get();
            
            $usuarios  = \App\User::findorfail($id);
            
            $pacientes = \App\Paciente::where('user_id', '=', $id)->get()->first();
            $pacientes->load('cargo');
            $pacientes->load('user');
            $pacientes->load('documentos');
            $pacientes->load('contatos');
            
        }catch( \Exception $e ){
            print $e->getMessage();
        }

        return view('clientes.show', ['pacientes'       => $pacientes,
                                      'arEspecialidade' => $arEspecialidade,
                                      'arEstados'       => $arEstados]);
    }
    
    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsuario)
    {
        try{
            $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
            $arEstados       = Estado::orderBy('ds_estado')->get();
            $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
            
            $usuarios = \App\User::findorfail($idUsuario);
            
            $pacientes = \App\Paciente::where('user_id', '=', $idUsuario)->get()->first();
            $pacientes->load('user');
            $pacientes->load('documentos');
            $pacientes->load('contatos');
        }catch( \Exception $e ){
            print $e->getMessage();
        }
        
        return view('clientes.edit', ['pacientes'          => $pacientes, 
                                      'arEstados'          => $arEstados,
                                      'arCargos'           => $arCargos,
                                      'arEspecialidade'    => $arEspecialidade]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesEditRequest $request, $idUsuario)
    {
        $dados = Request::all();        
        
        try{
            $profissional = \App\Paciente::findorfail($idUsuario);
            $profissional->update($dados);
            $profissional->user()->update($dados);
            
            foreach( $dados['contato_id'] as $indice=>$contato_id){
                $contato = \App\Contato::findorfail($contato_id);
                $contato->update(['tp_contato'=>$dados['tp_contato'][$indice], 'ds_contato'=>$dados['ds_contato'][$indice]]);
            }
            

            foreach( $dados['documentos_id'] as $indice=>$documentos_id){
                $documentos = \App\Documento::findorfail($documentos_id);
                $documentos->update(['tp_documento'=>$dados['tp_documento'][$indice], 'te_documento'=>UtilController::retiraMascara($dados['te_documento'][$indice])]);
            }
        }catch( \Exception $e ){
            return redirect()->route('clientes.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('clientes.index')->with('success', 'O usuário foi atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUser)
    {
        $usuario = User::findorfail($idUser);

		if($usuario->profissional()->count() != 0 || $usuario->responsavel()->count() != 0 || $usuario->representante()->count() != 0) {
			return redirect()->route('users.index')->with('error', 'Só podem ser exluidos usuários vinculados a um paciente.');
		}

        $usuario->cs_status = User::INATIVO;
        $usuario->save();

		# registra log
		RegistroLog::saveLog('Editar Usuário e Paciente', RegistroLog::UPDATE, $usuario);

		Paciente::where(['user_id' => $usuario->id])->update(['cs_status' => 'I']);

        return redirect()->route('clientes.index')->with('success', 'Usuário inativado com sucesso!');
    }
}