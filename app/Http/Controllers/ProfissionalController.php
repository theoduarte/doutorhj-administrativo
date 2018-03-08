<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionaisRequest;
use Illuminate\Support\Facades\DB;

/**
 * @author Frederico Cruz <frederico.cruz@s1saude.com.br>
 * 
 */
class ProfissionalController extends Controller
{
    /**
     * Método para mostrar a página de cadastro do profissional 
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        $arEstados       = \App\Estados::orderBy('ds_estado')->get();
        $arEspecialidade = \App\Especialidades::orderBy('ds_especialidade')->get();
        
        return view('profissional', ['arEstados' => $arEstados, 'arEspecialidade'=>$arEspecialidade]);
    }
    
    /**
     * 
     * @param ProfissionalsRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gravar(ProfissionaisRequest $request){
        DB::beginTransaction();
        
        try{
            $usuario = new \App\User();
  
            $usuario->name = strtoupper($request->input('nm_primario')).' '.strtoupper($request->input('nm_secundario'));
            $usuario->email = $request->input('email');
            $usuario->password = bcrypt($request->input('password'));
            $usuario->tp_user = 'PRO';
            $usuario->save();
            
            
            $arProfDocumento = array();
            $documento = new \App\Documentos($request->all());
            $documento->save();
            $arProfDocumento[] = $documento->id;
            
            # registro CRM
            $documentoCrm = new \App\Documentos($request->all());
            $documentoCrm->tp_documento = 'CRM';
            $documentoCrm->te_documento = $request->input('nr_crm');
            $documentoCrm->save(); 
            $arProfDocumento[] = $documentoCrm->id;
            
            
            
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
            
            $profissional  = new \App\Profissionais($request->all());
            $profissional->users_id = $usuario->id;
            
            $idEspecialidade = \App\Especialidades::where(['cd_especialidade'=>$request->input('cd_especialidade')])->get(['id'])->first();
            $profissional->profissional_especialidade_id = $idEspecialidade->id;
            $profissional->save();
            
            
            $profissional->contatos()->attach($arContatos);
            $profissional->enderecos()->attach([$endereco->id]);
            $profissional->documentos()->attach($arProfDocumento);
            $profissional->save();
            
            DB::commit();
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        }catch (\Exception $e){
            DB::rollBack(); 
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }
}
