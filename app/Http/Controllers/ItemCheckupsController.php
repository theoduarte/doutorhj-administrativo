<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\ItemCheckups;
use App\Checkups;
use Illuminate\Http\Request;

class ItemCheckupsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Checkups $checkup)
    {
        ItemCheckups::validationRules($request);

        $atendimento = new Atendimento;
        $atendimentos = $atendimento->getAll( $request->all() );

        foreach ($atendimentos as $atendimento) {
            $itemCheckup = new ItemCheckups;
            $itemCheckup->checkup_id = $checkup->id;
            $itemCheckup->atendimento_id = $atendimento->id;
            $itemCheckup->ds_item = $request->get('ds_item');
            $itemCheckup->vl_net_checkup = $request->get('vl_net_checkup');
            $itemCheckup->vl_com_checkup = $request->get('vl_com_checkup');
            $itemCheckup->save();
        }

        return redirect()->route('checkups.configure', $checkup)->with('success', 'Item(s) de checkup cadastrado(s) com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemCheckups  $itemCheckups
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCheckups $itemCheckups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemCheckups  $itemCheckups
     * @return \Illuminate\Http\Response
     */
    public function destroy($checkupId, $consultaId, $clinicas, $profissionals)
    {
        
        $atendimento = new Atendimento;
        $atendimentoResult = $atendimento->getAll( ['consulta_id' => $consultaId, 'clinica_id' => $clinicas, 'profissional_id' => explode(',', $profissionals)] );

        foreach ($atendimentoResult as $atendimento) {
            ItemCheckups::where('checkup_id', $checkupId)->where('atendimento_id', $atendimento->id )->delete();
        }
        
        return redirect()->route('checkups.configure', Checkups::find($checkupId))->with('success', 'Item(s) de checkup excluídos(s) com sucesso!');
    }
}
