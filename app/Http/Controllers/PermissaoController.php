<?php

namespace App\Http\Controllers;

use App\Permissao;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;

class PermissaoController extends Controller
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
        $get_term = CVXRequest::get('search_term');
    	$search_term = UtilController::toStr($get_term);
    	 
    	$permissaos = Permissao::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(url_action)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	 
    	return view('permissaos.index', compact('permissaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$query = "SELECT last_value FROM public.permissaos_id_seq as nextval";
    	$nextval = DB::select($query);
    	$next_rid = isset($nextval[0]) ? $nextval[0]->last_value : 0;
    	
//     	$count = DB::table('permissaos')->count();
//     	if($count == 0) {
//     	    $next_rid = 1;
//     	}
    	
    	$code_permission = sprintf( "%010d", decbin($next_rid));
    	
    	return view('permissaos.create', compact('code_permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$permissao = Permissao::create($request->all());
    	 
    	$permissao->save();
    	 
    	return redirect()->route('permissaos.index')->with('success', 'A Permissão foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$permissao = Permissao::findOrFail($id);
    	 
    	return view('permissaos.show', compact('permissao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$permissao = Permissao::findOrFail($id);
    	 
    	return view('permissaos.edit', compact('permissao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$permissao = Permissao::findOrFail($id);
    	 
    	$permissao->update($request->all());
    	 
    	return redirect()->route('permissaos.index')->with('success', 'A Permissão foi editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permissao  $permissao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$permissao = Permissao::findOrFail($id);
    	 
    	$permissao->delete();
    	 
    	return redirect()->route('permissaos.index')->with('success', 'Registro Excluído com sucesso!');
    }
    
    /**
     * getPerfilCode method
     * 
     * //retorna o codigo da permissão
     * @param string $action_name
     * @return integer
     */
    public function getPerfilCode($action_name) {
    	 
    	$permissao = Permissao::where('url_action', '=', $action_name)->first();
    	 
    	if(isset($permissao) && $permissao != null) {
    		return $permissao->id;
    	}
    	 
    	return 0;
    }
    
    /**
     * hasPermissao method
     *
     * @param string $Permissaos
     * @return boolean
     */
    public function hasPermissao(User $user_session,  $action_name) {
    	
    	//dd($user_session->perfiluser->tipo_permissao);
    	/* if($user_session->perfiluser->tipo_permissao == 1) {
    		return true;
    	} */
    	
    	$permission_code = $this->getPerfilCode($action_name);
    
    	if ($permission_code == 0) {
    		return true;
    	}
    	
    	$user_id = $user_session->id;
    	
    	$permissao = DB::table('permissaos')
    	   ->join('perfiluser_permissao', function($join1) use($permission_code) { $join1->on('permissaos.id', '=', 'perfiluser_permissao.permissao_id')->on('perfiluser_permissao.permissao_id', '=', DB::raw($permission_code));})
           ->join('perfilusers', function($join2) { $join2->on('perfiluser_permissao.perfiluser_id', '=', 'perfilusers.id');})
           ->join('users', function($join3) use($user_id) { $join3->on('perfilusers.id', '=', 'perfilusers.id')->on('users.id', '=', DB::raw($user_id));})
           ->select('permissaos.*', 'permissaos.id', 'permissaos.titulo')
           ->get()->first();
    	
    	if(isset($permissao) && $permissao != null) {
    		return true;
    	}
    
    	return false;
    }
    
    /**
     * hasPermissaoVisualizar method
     *
     * @param string $Permissaos
     * @return boolean
     */
    public function hasPermissaoVisualizar(User $user_session, $action_model, $action_type) {
        
        //dd($user_session->perfiluser->tipo_permissao);
        /* if($user_session->perfiluser->tipo_permissao == 1) {
         return true;
         } */
        
        $action_name = "$action_model.$action_type";
        
        $permission_code = $this->getPerfilCode($action_name);
        
        if ($permission_code == 0) {
            return true;
        }
        
        $user_id = $user_session->id;
        
        $permissao = DB::table('permissaos')
        ->join('perfiluser_permissao', function($join1) use($permission_code) { $join1->on('permissaos.id', '=', 'perfiluser_permissao.permissao_id')->on('perfiluser_permissao.permissao_id', '=', DB::raw($permission_code));})
        ->join('perfilusers', function($join2) { $join2->on('perfiluser_permissao.perfiluser_id', '=', 'perfilusers.id');})
        ->join('users', function($join3) use($user_id) { $join3->on('perfilusers.id', '=', 'perfilusers.id')->on('users.id', '=', DB::raw($user_id));})
        ->select('permissaos.*', 'permissaos.id', 'permissaos.titulo')
        ->get()->first();
        
        if(isset($permissao) && $permissao != null) {
            return true;
        }
        
        return false;
    }
}
