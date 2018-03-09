<?php

namespace App\Http\Controllers;

use App\Permissao;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class PermissaoController extends Controller
{
	
	/**
	 * Instantiate a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		/* $action = \Route::current();
		$action_name = $action->action['as'];
	
		$this->middleware("cvx:$action_name"); */
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_term = \Request::get('search_term');
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
    	$permissao = Cargo::findOrFail($id);
    	 
    	$permissao->delete();
    	 
    	return redirect()->route('permissaos.index')->with('success', 'Registro Excluído com sucesso!');
    }
    
    /**
     * getPerfilCode method
     * //retorna o codigo da permissão
     * @throws NotFoundException
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
     * @throws NotFoundException
     * @param string $Permissaos
     * @return boolean
     */
    public function hasPermissao(User $user_session,  $action_name) {
    	
    	//dd($user_session->perfiluser->tipo_permissao);
    	/* if($user_session->perfiluser->tipo_permissao == 1) {
    		return true;
    	} */
    	
    	$permission_code = $this->getPerfilCode($action_name);
    
    	if ($permissao_code == 0) {
    		return true;
    	}
    	
    	$user_id = $user_session.id;
    
    	$options['joins'] = array(
    			array('table' => 'jk_perfilusers_jk_permissaos', 'alias' => 'PfPermissao', 'type' => 'inner', 'conditions' => array( 'JkPermissao.id = PfPermissao.jk_permissao_id AND PfPermissao.jk_permissao_id = '.$permission_code)),
    			array('table' => 'jk_perfilusers', 'alias' => 'PfUsers', 'type' => 'inner', 'conditions' => array( 'PfPermissao.jk_perfiluser_id = PfUsers.id')),
    			array('table' => 'users', 'alias' => 'Users', 'type' => 'inner', 'conditions' => array( 'PfUsers.id = Users.jk_perfiluser_id AND Users.id = '.$user_id))
    	);
    
    	$permissao = $this->JkPermissao->find('first', $options);
    
    	// 		pr($this->JkPermissao->getDataSource()->showLog());
    	// 		pr($permissao);
    	// 		exit();
    
    	if (isset($permissao['JkPermissao'])) {
    		return true;
    	}
    
    	return false;
    }
}
