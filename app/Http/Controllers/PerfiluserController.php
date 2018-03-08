<?php

namespace App\Http\Controllers;

use App\Perfiluser;
use Illuminate\Http\Request;
use App\Menu;

class PerfiluserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function show(Perfiluser $perfiluser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfiluser $perfiluser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfiluser $perfiluser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfiluser $perfiluser)
    {
        //
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
