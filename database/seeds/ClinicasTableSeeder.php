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
		for($numero = 3000; $numero<=3200; $numero++){
			User::create([
					'id'			 => $numero,
					'name'           => 'Prestador '.$numero,
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
					'profissional_id'=>2010
				),
			));
			
			DB::table('enderecos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'sg_logradouro' => 'RUA',
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
			
			
			DB::table('documentos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'tp_documento' => 'CNH',
					'te_documento' => '3234235',
				),
			));
			
			DB::table('clinica_documento')->insert(array (
				0 => 
				array (
					'documento_id' => $numero,
					'clinica_id' => $numero,
				),
			));
		}
    }
}
