<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Filesystem\Filesystem;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Perfiluser;
use App\Http\Requests\UsuariosRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_term = CVXRequest::get('search_term');
    	$search_term = UtilController::toStr($get_term);
    	
    	$usuarios = User::where(DB::raw('to_str(name)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(email)'), 'LIKE', '%'.$search_term.'%')->orderby('created_at', 'desc')->sortable()->paginate(10);
    	 
    	return view('users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$perfilusers = Perfiluser::orderBy('titulo', 'asc')->pluck('titulo', 'id');
    	 
    	return view('users.create', compact('perfilusers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {
    	########### STARTING TRANSACTION ############
    	DB::beginTransaction();
    	#############################################
    	
    	//$usuario = User::create($request->all());
    	
    	$usuario            		= new User();
    	$usuario->name      		= $request->input('name');
    	$usuario->email     		= $request->input('email');
    	$usuario->password  		= bcrypt($request->input('password'));
    	$usuario->tp_user   		= $request->input('tp_user');
    	$usuario->cs_status 		= 'A';
    	$usuario->avatar 			= 'users/default.png';
    	$usuario->perfiluser_id 	= $request->input('perfiluser_id');
    	
    	$obj = new UtilController();
    	
    	if($usuario->save()) {
    		
    		$user_id = $usuario->id;
    		
    		if(!empty($request->file('avatar'))) {
    			$image = $request->file('avatar');
    			
    			$usuario->avatar = $obj->getImage($image, $user_id);
    			
    			$usuario->save();
    		}
    		
    	} else {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    		return redirect()->route('users.index')->with('error', 'O Usuário não foi salvo. Por favor, tente novamente.');
    	}
    	
    	DB::commit();
    	 
    	return redirect()->route('users.index')->with('success', 'O Usuário foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$usuario = User::findOrFail($id);
    	 
    	return view('users.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$usuario = User::findOrFail($id);
    	$perfilusers = Perfiluser::orderBy('titulo', 'asc')->pluck('titulo', 'id');
    	 
    	return view('users.edit', compact('usuario', 'perfilusers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosRequest $request, $id)
    {
    	
    	########### STARTING TRANSACTION ############
    	DB::beginTransaction();
    	#############################################
    	 
    	//$usuario = User::create($request->all());
    	 
    	$usuario            		= User::findOrFail($id);
    	$usuario->name      		= $request->input('name');
    	$usuario->email     		= $request->input('email');
    	$usuario->password  		= bcrypt($request->input('password'));
    	$usuario->tp_user   		= $request->input('tp_user');
    	$usuario->cs_status 		= 'A';
    	$usuario->avatar 			= 'users/default.png';
    	$usuario->perfiluser_id 	= $request->input('perfiluser_id');
    	 
    	$obj = new UtilController();
    	 
    	if($usuario->save()) {
    	
    		$user_id = $usuario->id;
    		if(!empty($request->file('avatar'))) {
    			$image = $request->file('avatar');
    			 
    			$usuario->avatar = $obj->getImage($image, $user_id);
    			 
    			$usuario->save();
    		}
    	
    	} else {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    		return redirect()->route('users.index')->with('error', 'O Usuário não foi editado. Por favor, tente novamente.');
    	}
    	 
    	DB::commit();
    	
    	return redirect()->route('users.index')->with('success', 'O Usuário foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$usuario = User::findOrFail($id);
    	
    	if($usuario->avatar != 'users/default.png') {
    		File::deleteDirectory(public_path().'/files/users/'.$usuario->id);
    	}
    	 
    	$usuario->delete();
    	 
    	return redirect()->route('users.index')->with('success', 'Registro Excluído com sucesso!');
    }
}
