<?php

namespace App\Http\Controllers;

use App\Perfiluser;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\DB;

class PerfiluserController extends Controller
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
    	
    	$perfilusers = Perfiluser::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	
    	$list_tipo_permissao = [1 => 'Administrador', 2 => 'Gestor', 3 => 'Prestador', 4 => 'Cliente'];
    	
    	return view('perfilusers.index', compact('perfilusers', 'list_tipo_permissao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('perfilusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$perfiluser = Perfiluser::create($request->all());
    	
    	$perfiluser->save();
    	
    	return redirect()->route('perfilusers.index')->with('success', 'A Permissão foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$perfiluser = Perfiluser::findOrFail($id);
    	
    	return view('perfilusers.show', compact('perfiluser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$perfiluser = Perfiluser::findOrFail($id);
    	
    	return view('perfilusers.edit', compact('perfiluser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$perfiluser = Perfiluser::findOrFail($id);
    	
    	$perfiluser->update($request->all());
    	
    	return redirect()->route('perfilusers.index')->with('success', 'A Permissão foi editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$perfiluser = Cargo::findOrFail($id);
    	
    	$perfiluser->delete();
    	
    	return redirect()->route('perfilusers.index')->with('success', 'Registro Excluído com sucesso!');
    }
    
    /**
     * Perform relationship.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    private function setMenuRelations(Perfiluser $perfiluser, Request $request)
    {
    	$menu = Menu::findOrFail($request->menu_id);
    	$perfiluser->menu()->associate($menu);
//     	$perfiluser->menus()->sync($request->causes_list);
    
    	return $perfiluser;
    }
}
