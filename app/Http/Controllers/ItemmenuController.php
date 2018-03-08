<?php

namespace App\Http\Controllers;

use App\Itemmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;

class ItemmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_term = \Request::get('search_term');
    	$search_term = UtilController::toStr($get_term);
    	
    	$itemmenus = Itemmenu::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
//     	$itemmenus = Itemmenu::select('id', 'titulo', 'menu_id', 'created_at')->with('menu')->get();
//     	dd($itemmenus);
    	
    	return view('itemmenus.index', compact('itemmenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$menus = Menu::orderBy('titulo', 'asc')->pluck('titulo', 'id');
    	
    	return view('itemmenus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$itemmenu = Itemmenu::create($request->all());
    	
    	
//     	$itemmenu = $this->setMenuRelations($itemmenu, $request);
    	$itemmenu->save();
    	
    	return redirect()->route('itemmenus.index')->with('success', 'O Item de Menu foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itemmenu  $itemmenu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$itemmenu = Itemmenu::findOrFail($id);
    	
    	return view('itemmenus.show', compact('itemmenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itemmenu  $itemmenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$itemmenu = Itemmenu::findOrFail($id);
    	$menus = Menu::orderBy('titulo', 'asc')->pluck('titulo', 'id');
    	
    	return view('itemmenus.edit', compact('itemmenu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itemmenu  $itemmenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	//$this->validate($request, Itemmenu::$rules);
    	
    	$itemmenu = Itemmenu::findOrFail($id);
    	
    	$itemmenu->update($request->all());
    	
    	return redirect()->route('itemmenus.index')->with('success', 'O Item de Menu foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itemmenu  $itemmenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$itemmenu = Itemmenu::findOrFail($id);
    	
    	$itemmenu->delete();
    	
    	return redirect()->route('itemmenus.index')->with('success', 'Registro Excluído com sucesso!');
    }
}
