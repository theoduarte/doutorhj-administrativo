<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicasRequest;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Cargo;
use App\Documento;
use App\Endereco;
use App\Cidade;
use App\Contato;
use App\Profissional;
use App\Clinica;

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
        $arEstados = Estado::orderBy('ds_estado')->get();
        $arCargos  = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        
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
            $documentoCnpj      = new Documento();
            $documentoCnpj->tp_documento = 'CNPJ';
            $documentoCnpj->te_documento = $request->input('nr_cnpj');
            $documentoCnpj->save();
            $arCliDocumento[]   = $documentoCnpj->id;
            
            
            
            # endereco da empresa
            $endereco            = new Endereco($request->all());
            $idCidade            = Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            
            # telefones do profissional
            $arContatos = array();
            
            $contato1             = new Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = new Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = new Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            
            # cadastro de profissional responsavel pela clinica
            $profissional           = new Profissional($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
            $profissional->enderecos()->attach([$endereco->id]);
            $profissional->documentos()->attach($arCliDocumento);
            $profissional->save();
            
            
            
            
            $clinica                  = new Clinica($request->all());
            $clinica->profissional_id = $profissional->id;
            $clinica->save();
            
            
            # contatos da clínica
            $arContatos = array();
            
            $contato1             = new Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = new Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = new Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            # endereco do responsavel
            $endereco            = new Endereco($request->all());
            $idCidade            = Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            # documento do responsável
//             $arCliDocumento     = array();
//             $documento          = new \App\Documentos($request->all());
//             $documento->save();
//             $arCliDocumento[]   = $documento->id;
            
            
            $profissional           = new Profissional($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
//             $clinica->enderecos()->attach([$endereco->id]);
//             $clinica->documentos()->attach($arCliDocumento);
            $clinica->save();
            
            DB::commit(); 
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        } catch (\Exception $e){
            DB::rollBack(); 
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }
}
