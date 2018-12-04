<?php

namespace App;

use App\Http\Controllers\UtilController;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agendamento extends Model
{
    use Sortable;
        
    public $fillable  = ['id', 'te_ticket', 'profissional_id', 'paciente_id', 'clinica_id', 'dt_atendimento', 'cs_status'];
    public $sortable  = ['id', 'te_ticket', 'dt_atendimento', 'cs_status'];
    public $dates 	  = ['dt_atendimento'];
	protected $appends = ['vl_pedido', ];

	/*
	 * Constants
	 */
	const PRE_AUTORIZAR  = 0;
	const PRE_AGENDADO   = 10;
	const CONFIRMADO     = 20;
	const NAO_CONFIRMADO = 30;
	const FINALIZADO     = 40;
	const AUSENTE        = 50;
	const CANCELADO      = 60;
	const AGENDADO       = 70;
	const RETORNO        = 80;
	const FATURADO       = 90;
	const PAGO           = 100;

	protected static $cs_status = array(
		self::PRE_AUTORIZAR  => 'Pre-Autorizar',
		self::PRE_AGENDADO   => 'Pré-Agendado',
		self::CONFIRMADO     => 'Confirmado',
		self::NAO_CONFIRMADO => 'Não Confirmado',
		self::FINALIZADO     => 'Finalizado',
		self::AUSENTE        => 'Ausente',
		self::CANCELADO      => 'Cancelado',
		self::AGENDADO       => 'Agendado',
		self::RETORNO        => 'Retorno',
		self::FATURADO       => 'Faturado',
		self::PAGO           => 'Pago'
	);
    
    /*
     * Relationship
     */
    public function atendimento()
    {
        return $this->belongsTo('App\Atendimento');
    }

    public function atendimentos()
    {
        return $this->belongsToMany('App\Atendimento')->whereNull('deleted_at');
    }
        
    public function paciente()
    {
        return $this->belongsTo('App\Paciente')->withDefault();
    }
    
    public function clinica()
    {
        return $this->belongsTo('App\Clinica');
    }
    
    public function profissional()
    {
        return $this->belongsTo('App\Profissional')->withDefault();
    }
    
    public function cupom_desconto()
    {
        return $this->belongsTo('App\CupomDesconto');
    }
    
    public function filial()
    {
        return $this->belongsTo('App\Filial');
    }
    
    public function itempedidos()
    {
        return $this->hasMany('App\Itempedido');
    }
    
    
    /*
     * Getters and Setters
     */
    public function getCsStatusAttribute($cdStatus) {
        return static::$cs_status[$cdStatus];
    }
    
    public function getDtAtendimentoAttribute($data) {
        $obData = new Carbon($data);
        return $obData->format('d/m/Y H:i');
    }
    
    public function getRawDtAtendimentoAttribute() {
        return $this->attributes['dt_atendimento'];
    }
    
    public function getRawCsStatusAttribute() {
        return $this->attributes['cs_status'];
    }

    public function getBusySchedule( $agendamento, $clinica, $profissional = null, $date ) {
        $bind = [];
        $queryStr = "   SELECT AG.ID, AG.DT_ATENDIMENTO, TO_CHAR(DT_ATENDIMENTO, 'HH24:MI') HORARIO
                          FROM AGENDAMENTOS AG
                          JOIN AGENDAMENTO_ATENDIMENTO AGAT ON (AG.ID = AGAT.AGENDAMENTO_ID AND AGAT.DELETED_AT IS NULL)
                          JOIN ATENDIMENTOS AT ON (AGAT.ATENDIMENTO_ID = AT.ID)
                         WHERE CAST(AG.DT_ATENDIMENTO AS DATE) = :date
                           AND AT.CLINICA_ID = :clinica
                           AND AG.ID <> :agendamento";

        if ( !empty($profissional) ) {
            $bind['profissional'] = $profissional;
            $queryStr .= " AND AT.PROFISSIONAL_ID = :profissional";
        }
        
        $queryStr .= " ORDER BY AG.DT_ATENDIMENTO";

        $bind['date'] = $date;
        $bind['clinica'] = $clinica;
        $bind['agendamento'] = $agendamento;


        $query = DB::select($queryStr, $bind);

        return $query;       
    }


    public static function getStatusAgendamento() {
        return static::$cs_status;
    }

	public function getVlPedidoAttribute()
	{
		return $this->getVlPedido($this->attributes['id']); //some logic to return numbers
	}

    public static function getVlPedido($agendamento_id = null)
	{
		if(is_null($agendamento_id)) {
			return null;
		}

		$vlPedido = Itempedido::where('agendamento_id', $agendamento_id)
			->select(DB::raw('SUM(valor) as vl_pedido'))->first();

		if(is_null($vlPedido) && empty($vlPedido->vl_pedido)) {
			return 0;
		} else {
			return $vlPedido->vl_pedido;
		}
	}
}