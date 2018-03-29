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
            				'bo_contato_inicial'     => 1,
            				'bo_contato_final'       => 1,
            				'te_ticket'              => 'C933S4T',
            				'dt_consulta_primaria'   => '2018-03-28 14:11:32',
            				'dt_consulta_secundaria' => '2018-03-28 14:11:32',
            				'bo_consulta_consumada'  => 1,
            				'te_observacoes'         => 'teste...',
            				'profissional_id'        => 2013,
            				'clinica_id'             => 3000,
            				'paciente_id'            => 1002
                		]);
    	}
    }
}
