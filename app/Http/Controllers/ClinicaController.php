<?php

namespace App\Http\Controllers;

use TCG\Voyager\Facades\Voyager;
use App\Http\Requests\ClinicasRequest;
use Illuminate\Support\Facades\DB;

/**
 * @author Frederico Cruz <frederico.cruz@s1saude.com.br>
 * 
 */
class ClinicaController extends Controller
{
    /**
     * Método para mostrar a página de cadastro do clinica 
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        $arEstados = \App\Estados::orderBy('ds_estado')->get();
        $arCargos  = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        
        return view('clinica', ['arEstados' => $arEstados, 'arCargos'=> $arCargos]);
    }
    
    /**
     * 
     * 
     * @param ClinicasRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gravar(ClinicasRequest $request){
        DB::beginTransaction();
        
        try{
            # dados de acesso do usuário que é o profissional responsável pela empresa
            $usuario            = new \App\User();
            $usuario->name      = strtoupper($request->input('nm_primario').' '.$request->input('nm_secundario'));
            $usuario->email     = $request->input('email');
            $usuario->password  = bcrypt($request->input('password'));
            $usuario->tp_user   = 'ADM';
            $usuario->cs_status = 'A';
            $usuario->role_id = 61;
            $usuario->save();
            
            


            # documento da empresa CNPJ
            $documentoCnpj      = new \App\Documentos();
            $documentoCnpj->tp_documento = 'CNPJ';
            $documentoCnpj->te_documento = $request->input('nr_cnpj');
            $documentoCnpj->save();
            $arCliDocumento[]   = $documentoCnpj->id;
            
            
            
            # endereco da empresa
            $endereco            = new \App\Enderecos($request->all());
            $idCidade            = \App\Cidades::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            
            # telefones do profissional
            $arContatos = array();
            
            $contato1             = new \App\Contatos();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = new \App\Contatos();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = new \App\Contatos();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            
            # cadastro de profissional responsavel pela clinica
            $profissional           = new \App\Profissionais($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
            $profissional->enderecos()->attach([$endereco->id]);
            $profissional->documentos()->attach($arCliDocumento);
            $profissional->save();
            
            
            
            
            $clinica                  = new \App\Clinicas($request->all());
            $clinica->profissional_id = $profissional->id;
            $clinica->save();
            
            
            # contatos da clínica
            $arContatos = array();
            
            $contato1             = new \App\Contatos();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = new \App\Contatos();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = new \App\Contatos();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            # endereco do responsavel
            $endereco            = new \App\Enderecos($request->all());
            $idCidade            = \App\Cidades::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            # documento do responsável
//             $arCliDocumento     = array();
//             $documento          = new \App\Documentos($request->all());
//             $documento->save();
//             $arCliDocumento[]   = $documento->id;
            
            
            $profissional           = new \App\Profissionais($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
//             $clinica->enderecos()->attach([$endereco->id]);
//             $clinica->documentos()->attach($arCliDocumento);
            $clinica->save();
            
            DB::commit(); 
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        }catch (\Exception $e){
            DB::rollBack(); 
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }
}
