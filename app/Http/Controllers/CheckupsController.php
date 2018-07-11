<?php

namespace App\Http\Controllers;

use App\Checkups;
use App\ItemCheckups;
use App\Especialidade;
use App\Clinica;
use App\Consulta;
use App\Profissional;
use App\Atendimento;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CheckupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkups = Checkups::paginate(10);
        return view('checkups.index', compact('checkups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Checkups::validationRules($request);

        $checkup = Checkups::create($request->all());
        $checkup->cs_status = "I";
        $checkup->save();

        return redirect()->route('checkups.index')->with('success', 'O Checkup foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkups  $checkups
     * @return \Illuminate\Http\Response
     */
    public function show(Checkups $checkups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checkups  $checkups
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkups $checkup)
    {
        return view('checkups.edit', ['checkup' => $checkup] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkups  $checkups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkups $checkup)
    {
        Checkups::validationRules($request, true);

        $checkup->update($request->all());

        return redirect()->route('checkups.index')->with('success', 'O Checkup foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkups  $checkups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkups $checkup)
    {
        $checkup->cs_status = "I";
        $checkup->save();

        return redirect()->route('checkups.index')->with('success', 'O Checkup foi inativado com sucesso!');
    }

    /**
     * Configure the specified resource from storage.
     *
     * @param  \App\Checkups  $checkups
     * @return \Illuminate\Http\Response
     */
    public function configure(Checkups $checkup)
    {
        $itemCheckup = new ItemCheckups();
        $itemCheckups = $itemCheckup->getItensGrouped($checkup->id);

        $especialidade = new Especialidade();
        $especialidades = $especialidade->getActive();

        return view('checkups.configure', ['checkup' => $checkup, 'itemCheckups' => $itemCheckups, 'especialidades' => $especialidades] );
    }

    /**
     * Get clinicas by especialidade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getClinicasByEspecidalide(Request $request)
    {
        $clinica = new Clinica();
        $especialidades = $clinica->getActiveByEspecialidade( $request->get('especialidade_id') );

        echo json_encode($especialidades);
        exit;
    }

    /**
     * Get clinicas by especialidade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getConsultasByEspecidalide(Request $request)
    {
        $consulta = new Consulta();
        $especialidades = $consulta->getActiveByEspecialidade( $request->get('especialidade_id') );

        echo json_encode($especialidades);
        exit;
    }

    /**
     * Get clinicas by especialidade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProfissionalsByClinica(Request $request)
    {
        $profissional = new Profissional();
        $profissionals = $profissional->getActiveProfissionalsByClinicaEspecialidade( $request->get('clinica_id'), $request->get('especialidade_id') );

        echo json_encode($profissionals);
        exit;
    }

    /**
     * Get atendimento values
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAtendimentoValuesByConsulta(Request $request)
    {
        $atendimento = new Atendimento;
        $atendimentoResult = $atendimento->getFirst( $request->all() );

        echo json_encode($atendimentoResult);
        exit;
    }
}
