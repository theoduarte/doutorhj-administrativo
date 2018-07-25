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
    	                    'dt_atendimento'         => date('Y-m-d'). ' 14:00:00',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 60,
							'atendimento_id'		 => 12006
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 1,
    	        'valor' => 100.00,
    	    ]);
    	    
    	    
    	    
    	    Agendamento::create(
    	                  [
            				'id'                     => 2,
            				'te_ticket'              => 'C953W4W',
    	                    'dt_atendimento'         => date('Y-m-d'). ' 14:30:00',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 20,
							'atendimento_id'		 => 4001
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 2,
    	        'valor' => 100.00,
    	    ]);
    	    
    	    
    	    
    	    Agendamento::create(
    	                  [
            				'id'                     => 3,
            				'te_ticket'              => 'C933W4W',
            				'dt_atendimento'         => date('Y-m-d'). ' 15:00:00',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 20,
							'atendimento_id'		 => 8002
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 3,
    	        'valor' => 100.00,
    	    ]);
    	    
    	    
    	    Agendamento::create(
    	                  [
            				'id'                     => 4,
            				'te_ticket'              => 'C933EEW',
            				'dt_atendimento'         => date('Y-m-d'). ' 16:00:00',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 10,
							'atendimento_id'		 => 12003
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 4,
    	        'valor' => 100.00,
    	    ]);
    	    
    	    
    	    Agendamento::create(
    	                  [
            				'id'                     => 5,
            				'te_ticket'              => 'C933EEQ',
    	                    'dt_atendimento'         => date('Y-m-d'). ' 08:30:00',
            				'clinica_id'             => 4000,
            				'profissional_id'        => 2001,
            				'paciente_id'            => 1002,
    	                    'cs_status'              => 10,
							'atendimento_id'		 => 4002
                		  ]
    	        );
    	    
    	    Itempedido::create([
    	        'agendamento_id' => 5,
    	        'valor' => 100.00,
    	    ]);
    	    
    	  
    	}
    }
}
