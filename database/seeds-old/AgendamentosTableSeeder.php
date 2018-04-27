<?php

use Illuminate\Database\Seeder;
use App\Agendamento;
use App\Itempedido;

class AgendamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (Agendamento::count() == 0) {
    	    Agendamento::create(
    	                  [
            				'id'                     => 1,
            				'te_ticket'              => 'C933S4T',
            				'dt_atendimento'         => '2018-03-28 14:11:32',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 10
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 1,
    	        'valor' => 100.00,
    	    ]);
    	}
    }
}
