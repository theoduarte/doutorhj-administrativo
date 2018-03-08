<?php

namespace App\Http\Controllers;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Request;

class PrestadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Voyager::canorfail('browse_local_atendimento');
        $data['add']     = Voyager::can('add_local_atendimento');
        $data['edit']    = Voyager::can('edit_local_atendimento');
        $data['read']    = Voyager::can('read_local_atendimento');
        $data['delete']  = Voyager::can('delete_local_atendimento');
        
        $prestadores = \App\Clinicas::select(['id', 'nm_razao_social', 'nm_fantasia'])
                    ->where(function($query){
//                         if(!empty(Request::input('nm_busca'))){
//                             switch (Request::input('tp_filtro')){
//                                 case "nome" :
//                                     $query->where('name', 'like', '%'.strtoupper(Request::input('nm_busca')).'%');
//                                     break;
//                                 case "email" :
//                                     $query->where('email', '=', strtolower(Request::input('nm_busca')));
//                                     break;
//                                 default:
//                                     $query->where('name', 'like', '%'.strtoupper(Request::input('nm_busca')).'%');
                                    
//                             }
//                         }
                    })->paginate(20);
        
        Request::flash();
        
        return view('prestadores.index', [/* 'coEspecialidades'=>$coEspecialidades, */ 'permissoes'=>$data, 'prestadores'=>$prestadores]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Voyager::canorfail('add_local_atendimento');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Voyager::canorfail('add_local_atendimento');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Voyager::canorfail('read_local_atendimento');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Voyager::canorfail('edit_local_atendimento');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Voyager::canorfail('edit_local_atendimento');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voyager::canorfail('delete_local_atendimento');
        
    }
}
