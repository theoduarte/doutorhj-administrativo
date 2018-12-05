<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Especialidade extends Model
{	  
    use Sortable;
    
    public $fillable   = ['cd_especialidade', 'ds_especialidade', 'titulacao_id'];
    public $sortable   = ['id', 'cd_especialidade', 'ds_especialidade', 'titulacao_id'];
    
    public function titulacao(){
        return $this->belongsTo('App\Titulacao');
    }
    
    public function getActive(){
        
        return DB::select(" SELECT DISTINCT e.*
                              FROM especialidades e
                              JOIN consultas c ON (e.id = c.especialidade_id)
                              JOIN atendimentos at ON (c.id = at.consulta_id)
                              JOIN clinicas cl ON (at.clinica_id = cl.id)
                             WHERE at.profissional_id IS NOT NULL
                               AND at.cs_status = 'A'
                               AND cl.cs_status = 'A'");
    }

	public static function getNomeEspecialidade($agendamento_id)
	{
		$agendamento = Agendamento::find($agendamento_id);

		//--busca pelas especialidades do atendimento--------------------------------------
		$especialidades = [];
		$ds_atendimento = "";

		if(!is_null($agendamento->atendimento_id)) {
			if(!is_null($agendamento->profissional_id)) {
				$agendamento->profissional->load('especialidades');

				foreach ($agendamento->profissional->especialidades as $especialidade) {
					$especialidades[] = $especialidade->ds_especialidade;
				}
			}

			if(!is_null($agendamento->atendimento->consulta_id)) {
				$agendamento->atendimento->load('consulta');
				$agendamento->atendimento->consulta->load('tag_populars');

				if(!is_null($agendamento->atendimento->consulta->tag_populars->first())) {
					$ds_atendimento = $agendamento->atendimento->consulta->tag_populars->first()->cs_tag;
				}
			} elseif(!is_null($agendamento->atendimento->procedimento_id)) {
				$agendamento->atendimento->load('procedimento');
				$agendamento->atendimento->procedimento->load('tag_populars');

				$especialidades[] = $agendamento->atendimento->procedimento->ds_procedimento;
				if(!is_null($agendamento->atendimento->procedimento->tag_populars->first())) {
					$ds_atendimento = $agendamento->atendimento->procedimento->tag_populars->first()->cs_tag;
				}
			}
		} else {
			return [
				'ds_atendimento' => '',
				'nome_especialidades' => ''
			];
		}


		return [
			'ds_atendimento' => $ds_atendimento,
			'nome_especialidades' => implode(' | ', $especialidades)
		];
	}
}