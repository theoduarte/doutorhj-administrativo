<?php

use Illuminate\Database\Seeder;

class AgendamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (\App\Agendamento::count() == 0) {
    	    \App\Agendamento::create([
            				'id'                     => 1,
            				'te_ticket'              => 'C933S4T',
            				'dt_consulta1'           => '2018-03-28 14:11:32',
            				'dt_consulta2'           => '2018-03-28 14:11:32',
            				'dt_consulta3'           => '2018-03-28 14:11:32',
            				'dt_atendimento'         => null,
            				'obs_cancelamento'       => null,
            				'obs_agendamento'        => null, 
            				'clinica_id'             => 3000,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 10
                		]);
    	}
    }
}
