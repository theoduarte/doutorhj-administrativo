<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Checkup extends Model
{
	
	use Sortable;
	
    public $fillable    = ['id', 'titulo', 'vl_total_com', 'vl_total_net', 'cs_status', 'tipo'];
    public $sortable  	= ['id', 'titulo', 'vl_total_com', 'vl_total_net', 'cs_status', 'tipo'];

    const ATIVO = 'A';
    const INATIVO = 'I';
    
    public function itemcheckups(){
    	return $this->hasMany('App\ItemCheckup');
    }
    
    public function agendamentos(){
    	return $this->hasMany('App\Agendamento');
    }

    public function getActive() {
        return $this->where('cs_status', 'A')->get();
    }

    public function getSummary( $checkupId ) {
        return DB::select(" SELECT 1 ORDEM, CASE WHEN COUNT(1) > 1 THEN 'Consultas ' ELSE 'Consulta ' END TIPO, CK.ID, CK.TITULO, E.DS_ESPECIALIDADE ESPECIALIDADE, 
                                   COUNT(1) QTY, STRING_AGG( COALESCE(TAGS.CS_TAG,AT.DS_PRECO,C.DS_CONSULTA), '; ') TAG
                              FROM CHECKUPS CK
                              JOIN ITEM_CHECKUPS ICK ON (CK.ID = ICK.CHECKUP_ID)
                              JOIN ATENDIMENTOS AT ON (ICK.ATENDIMENTO_ID = AT.ID)
                              JOIN CONSULTAS C ON (AT.CONSULTA_ID = C.ID)
                              JOIN ESPECIALIDADES E ON (C.ESPECIALIDADE_ID = E.ID)
                              JOIN TIPOATENDIMENTOS TP ON (C.TIPOATENDIMENTO_ID = TP.ID)
                              LEFT JOIN (  SELECT TP.CONSULTA_ID, replace(TP.CS_TAG, ': Laboratorio', '') CS_TAG
                                       FROM TAG_POPULARS TP
                                         JOIN ( SELECT MAX(ID) ID, CONSULTA_ID
                                            FROM TAG_POPULARS TPI
                                           GROUP BY CONSULTA_ID) INTERNO ON (TP.ID = INTERNO.ID) ) TAGS ON (TAGS.CONSULTA_ID = C.ID)
                               WHERE CK.ID = ?
                               GROUP BY CK.ID, E.DS_ESPECIALIDADE
                              UNION
                              SELECT 2 ORDEM, CONCAT(CASE WHEN COUNT(1) > 1 THEN 'Exames - ' ELSE 'Exame - ' END, GP.DS_GRUPO) TIPO, CK.ID, CK.TITULO, GP.DS_GRUPO ESPECIALIDADE, 
                                 COUNT(1) QTY, STRING_AGG( COALESCE(TAGS.CS_TAG,AT.DS_PRECO,P.DS_PROCEDIMENTO), '; ') TAG
                              FROM CHECKUPS CK
                              JOIN ITEM_CHECKUPS ICK ON (CK.ID = ICK.CHECKUP_ID)
                              JOIN ATENDIMENTOS AT ON (ICK.ATENDIMENTO_ID = AT.ID)
                              JOIN PROCEDIMENTOS P ON (AT.PROCEDIMENTO_ID = P.ID)
                              JOIN GRUPO_PROCEDIMENTOS GP ON (P.GRUPOPROCEDIMENTO_ID = GP.ID)
                              JOIN TIPOATENDIMENTOS TP ON (P.TIPOATENDIMENTO_ID = TP.ID)
                              LEFT JOIN (  SELECT TP.PROCEDIMENTO_ID, replace(TP.CS_TAG, ': Laboratorio', '') CS_TAG
                                       FROM TAG_POPULARS TP
                                         JOIN ( SELECT MAX(ID) ID, PROCEDIMENTO_ID
                                            FROM TAG_POPULARS TPI
                                           GROUP BY PROCEDIMENTO_ID) INTERNO ON (TP.ID = INTERNO.ID) ) TAGS ON (TAGS.PROCEDIMENTO_ID = P.ID)
                               WHERE CK.ID = ?
                               GROUP BY CK.ID, GP.DS_GRUPO
                               ORDER BY ORDEM, QTY", [$checkupId,$checkupId] );
    }
}
