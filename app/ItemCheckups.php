<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ItemCheckups extends Model
{
    public function atendimento() {
        return $this->belongsTo('App\Atendimento');
    }

    public function getVlNetCheckupAttribute($value) {
        return number_format( $value,  2, '.', ',');
    }
    
    public function getVlComCheckupAttribute($value) {
        return number_format( $value,  2, '.', ',');
    }
       
    public function getVlMercadoAttribute($value) {
        return number_format( $value,  2, '.', ',');
    }
       
    public function setVlNetCheckupAttribute($value){
        if (empty($value)) return;
            
        $this->attributes['vl_net_checkup'] = str_replace(',', '.', str_replace('.', '', $value));
    }
    
    public function setVlComCheckupAttribute($value){
        if (empty($value)) return;
            
        $this->attributes['vl_com_checkup'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    public function setVlMercadoAttribute($value){
        if (empty($value)) return;
            
        $this->attributes['vl_mercado'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    /*
    -- Validation Rules --
    */
    public static function validationRules(Request $request) {
        $fields['vl_net_checkup'] = ['required'];
        $fields['vl_com_checkup'] = ['required'];

        $messages['vl_net_checkup.required'] = 'O campo "Vl. NET Checkup" é obrigatório';
        $messages['vl_com_checkup.required'] = 'O campo "Vl. Comercial Checkup" é obrigatório';
        
        Validator::make( $request->all(), $fields, $messages )->validate();
    }

    /*
    -- Validation Rules --
    */
    public static function validationRulesExame(Request $request) {
        $fields['vl_net_checkup']  = ['required'];
        $fields['vl_com_checkup']  = ['required'];
        $fields['clinica_id']      = ['required'];
        $fields['procedimento_id'] = ['required'];


        $messages['vl_net_checkup.required'] = 'O campo "Vl. NET Checkup" é obrigatório';
        $messages['vl_com_checkup.required'] = 'O campo "Vl. Comercial Checkup" é obrigatório';
        $messages['clinica_id.required'] = 'O campo "Clinica" é obrigatório';
        $messages['procedimento_id.required'] = 'O campo "Exame/Procedimento" é obrigatório';
        
        Validator::make( $request->all(), $fields, $messages )->validate();
    }

	public function getItensGrouped($checkup) {
    	return DB::select(" SELECT *
                              FROM (
                            SELECT  ic.checkup_id, ds_item, a.vl_com_atendimento, a.vl_net_atendimento, ic.vl_com_checkup, ic.vl_net_checkup, ic.vl_mercado,
                                c.id consulta_id, c.cd_consulta, c.ds_consulta,
                                CONCAT( '[', STRING_AGG( DISTINCT CONCAT('{\"id\":', p.id, ', \"name\":\"', p.nm_primario, ' ', p.nm_secundario,'\"}'), ',' ), ']') profissionals,
                                CONCAT( '[', STRING_AGG( DISTINCT CONCAT('{\"id\":', cn.id, ', \"name\":\"', cn.nm_fantasia,'\"}'), ',' ), ']') clinicas
                              FROM item_checkups ic
                              JOIN atendimentos a ON (ic.atendimento_id = a.id)
                              JOIN profissionals p ON (a.profissional_id = p.id)
                              JOIN consultas c ON (a.consulta_id = c.id)
                              JOIN clinicas cn ON (a.clinica_id = cn.id)
                             WHERE checkup_id = ?
                             GROUP BY ic.checkup_id, ds_item, a.vl_com_atendimento, a.vl_net_atendimento, ic.vl_com_checkup, ic.vl_net_checkup, ic.vl_mercado,
                                c.id, c.cd_consulta, c.ds_consulta) valores
                             JOIN ( SELECT  TOTALS.checkup_id, SUM(TOTALS.vl_com_atendimento) total_vl_com_atendimento, 
                                       SUM(TOTALS.vl_net_atendimento) total_vl_net_atendimento, SUM(TOTALS.vl_com_checkup) total_vl_com_checkup, 
                                       SUM(TOTALS.vl_net_checkup) total_vl_net_checkup, SUM(TOTALS.vl_mercado) total_vl_mercado
                                  FROM (
                                SELECT  ic.checkup_id, c.id consulta_id, c.cd_consulta, cn.id,
                                    SUM(a.vl_com_atendimento) vl_com_atendimento, SUM(a.vl_net_atendimento) vl_net_atendimento, 
                                    SUM(ic.vl_com_checkup) vl_com_checkup, SUM(ic.vl_net_checkup) vl_net_checkup, SUM(ic.vl_mercado) vl_mercado
                                  FROM item_checkups ic
                                  JOIN atendimentos a ON (ic.atendimento_id = a.id)
                                  JOIN consultas c ON (a.consulta_id = c.id)
                                  JOIN clinicas cn ON (a.clinica_id = cn.id)
                                 WHERE checkup_id = ?
                                 GROUP BY ic.checkup_id, c.id, c.cd_consulta, cn.id) TOTALS
                                 GROUP BY TOTALS.checkup_id) totais on (totais.checkup_id = valores.checkup_id)", [$checkup,$checkup] );
	}

	public function getItensExameGrouped($checkup) {
        return DB::select(" SELECT *
                              FROM (   
                              SELECT ic.checkup_id, ds_item, a.vl_com_atendimento, a.vl_net_atendimento, ic.vl_com_checkup, ic.vl_net_checkup, ic.vl_mercado,
                               p.id procedimento_id, p.cd_procedimento, p.ds_procedimento,
                               CONCAT( '[', STRING_AGG( DISTINCT CONCAT('{\"id\":', cn.id, ', \"name\":\"', cn.nm_fantasia,'\"}'), ',' ), ']') clinicas
                              FROM item_checkups ic
                              JOIN atendimentos a ON (ic.atendimento_id = a.id)
                              JOIN procedimentos p ON (a.procedimento_id = p.id)
                              JOIN clinicas cn ON (a.clinica_id = cn.id)
                              WHERE checkup_id = ?
                              GROUP BY ic.checkup_id, ds_item, a.vl_com_atendimento, a.vl_net_atendimento, ic.vl_com_checkup, ic.vl_net_checkup, ic.vl_mercado,
                                 p.id, p.cd_procedimento, p.ds_procedimento) valores
                              JOIN (SELECT  TOTALS.checkup_id, SUM(TOTALS.vl_com_atendimento) total_vl_com_atendimento, SUM(TOTALS.vl_net_atendimento) total_vl_net_atendimento, 
                                SUM(TOTALS.vl_com_checkup) total_vl_com_checkup, SUM(TOTALS.vl_net_checkup) total_vl_net_checkup, SUM(TOTALS.vl_mercado) total_vl_mercado
                                FROM (
                                SELECT  ic.checkup_id, p.id procedimento_id, p.cd_procedimento, cn.id,
                                  SUM(a.vl_com_atendimento) vl_com_atendimento, SUM(a.vl_net_atendimento) vl_net_atendimento, 
                                  SUM(ic.vl_com_checkup) vl_com_checkup, SUM(ic.vl_net_checkup) vl_net_checkup, SUM(ic.vl_mercado) vl_mercado
                                FROM item_checkups ic
                                JOIN atendimentos a ON (ic.atendimento_id = a.id)
                                JOIN procedimentos p ON (a.procedimento_id = p.id)
                                JOIN clinicas cn ON (a.clinica_id = cn.id)
                                 WHERE ic.checkup_id = ?
                                 GROUP BY ic.checkup_id, p.id, p.cd_procedimento, cn.id) TOTALS
                                 GROUP BY TOTALS.checkup_id) totais on (totais.checkup_id = valores.checkup_id)", [$checkup,$checkup] );
    }
}