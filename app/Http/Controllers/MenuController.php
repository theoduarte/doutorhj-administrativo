<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as CVXRequest;

class MenuController extends Controller
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
    	 
    	$menus = Menu::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	 
    	return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$menu = Menu::create($request->all());
    	 
    	$menu->save();
    	 
    	return redirect()->route('menus.index')->with('success', 'O Menu foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$menu = Menu::findOrFail($id);
    	 
    	return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$menu = Menu::findOrFail($id);
    	 
    	return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	//$this->validate($request, Menu::$rules);
    	 
    	$menu = Menu::findOrFail($id);
    	 
    	$menu->update($request->all());
    	 
    	return redirect()->route('menus.index')->with('success', 'O Menu foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$menu = Menu::findOrFail($id);
    	 
    	$menu->delete();
    	 
    	return redirect()->route('menus.index')->with('success', 'Registro Excluído com sucesso!');
    }
}
