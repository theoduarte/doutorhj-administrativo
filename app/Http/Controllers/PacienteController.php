<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacientesRequest;
use Illuminate\Support\Facades\DB;

/**
 * @author Frederico Cruz <frederico.cruz@s1saude.com.br>
 * 
 */
class PacienteController extends Controller
{    
    /**
     * Método para mostrar a página de cadastro do paciente 
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        $arEstados       = \App\Estados::orderBy('ds_estado')->get();
        $arEspecialidade = \App\Especialidades::orderBy('ds_especialidade')->get();
        
        return view('paciente', ['arEstados' => $arEstados, 
                                 'arCargos'=> $arCargos, 
                                 'arEspecialidade'=>$arEspecialidade]);
    }
    
     
    /**
     * 
     * @param PacientesRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gravar(PacientesRequest $request){
        DB::beginTransaction();
        
        try{
            $usuario = new \App\User();
            $usuario->name = strtoupper($request->input('nm_primario').' '.$request->input('nm_secundario'));
            $usuario->email = $request->input('email');
            $usuario->password = bcrypt($request->input('password'));
            $usuario->tp_user = 'PAC';
            $usuario->save();  
            
            
            $documento = new \App\Documentos($request->all());
            $documento->save();
            
            
            $endereco = new \App\Enderecos($request->all());
            $idCidade = \App\Cidades::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            # telefones ---------------------------------------------
            $arContatos = array();
            
            $contato1 = new \App\Contatos();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2 = new \App\Contatos();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            
            if(!empty($request->input('ds_contato3'))){
                $contato3 = new \App\Contatos();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            $paciente  = new \App\Pacientes($request->all());
            $paciente->users_id = $usuario->id;       
            $paciente->save();

            
            $paciente->contatos()->attach($arContatos);
            $paciente->enderecos()->attach([$endereco->id]);
            $paciente->documentos()->attach([$documento->id]);
            $paciente->save();
            
            DB::commit();
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        }catch (\Exception $e){
            DB::rollBack(); 
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }
}
