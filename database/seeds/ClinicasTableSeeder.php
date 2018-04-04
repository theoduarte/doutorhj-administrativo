<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class ClinicasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for($numero = 4000; $numero<=4001; $numero++){
			User::create([
					'id'			 => $numero,
					'name'           => 'Clínica '.$numero,
					'email'          => 'responsavelclinica'.$numero.'@gmail.com',
					'password'       => bcrypt('1234'),
					'remember_token' => str_random(60),
					'tp_user'	     => 'CLI',
					'cs_status'	     => 'A'
			]);
            		   
			DB::table('clinicas')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'nm_razao_social' => 'BRASILMED '.$numero,
					'nm_fantasia' => 'BRASILMED LTDA '.$numero,
					'responsavel_id'=>1
				),
			));
			
			DB::table('enderecos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'sg_logradouro' => 'Rua',
					'te_endereco' => 'RUA PROPÍCIO DE PINA N.656',
					'nr_logradouro' => '656',
					'te_bairro' => 'DOM PEDRO II',
					'nr_cep' => '75140060',
					'cidade_id'=> 5491
				),
			));
			
			DB::table('clinica_endereco')->insert(array (
				0 => 
				array (
					'endereco_id' => $numero,
					'clinica_id' => $numero,
				),
			));
			
			
			
			DB::table('contatos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'tp_contato' => 'FC',
					'ds_contato' => '(61)99999999',
				),
			));
			
			DB::table('clinica_contato')->insert(array (
				0 => 
				array (
					'contato_id' => $numero,
					'clinica_id' => $numero,
				),
			));
			
			$nrDocProfissional = $numero + 4000;
			DB::table('documentos')->insert(array (
			    0 =>
			    array (
			        'id' => $nrDocProfissional,
			        'tp_documento' => 'CNPJ',
			        'te_documento' => '10696691000163',
			    ),
			));
			
			DB::table('clinica_documento')->insert(array (
			    0 =>
			    array (
			        'documento_id' => $nrDocProfissional,
			        'clinica_id' => $numero,
			    ),
			));
			
			/* $nrDocProfissional = $numero + 6000;
			DB::table('documentos')->insert(array (
			    0 =>
			    array (
			        'id' => $nrDocProfissional,
			        'tp_documento' => 'CNH',
			        'te_documento' => '10203040',
			    ),
			));
			
			DB::table('documento_profissional')->insert(array (
			    0 =>
			    array (
			        'documento_id' => $nrDocProfissional,
			        'profissional_id' => 2010,
			    ),
			)); */
			
			$idAtendimento = $numero;
			
            DB::table('atendimentos')->insert(array (
                    0 =>
                    array (
                            'id' => ++$idAtendimento,
                            'vl_atendimento'=>2400.40,
                            'ds_preco' => 'teste...',
                            'clinica_id' => $numero,
                            'consulta_id' => null,
                            'procedimento_id' => 8381
                    )
            ));
		}
    }
}
