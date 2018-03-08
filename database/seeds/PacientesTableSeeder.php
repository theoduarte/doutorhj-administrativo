<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pacientes;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for($numero = 1000; $numero<=2000; $numero++){

			User::create([
					'id'			 => $numero,
					'name'           => 'Frederico Cruz '.$numero,
					'email'          => 'datacruzsistemas'.$numero.'@gmail.com',
					'password'       => bcrypt('1234'),
					'remember_token' => str_random(60),
					'tp_user'	     => 'PAC',
					'cs_status'	     => 'A'
			]);
				   
			\DB::table('pacientes')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'nm_primario' => 'FREDERICO',
					'nm_secundario' => 'GOMES DA CRUZ',
					'cs_sexo'=>'M',
					'dt_nascimento'=> '07/01/1986',
					'user_id'=> $numero
				),
			));
			
			\DB::table('enderecos')->insert(array (
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
			
			\DB::table('endereco_paciente')->insert(array (
				0 => 
				array (
					'endereco_id' => $numero,
					'paciente_id' => $numero,
				),
			));
			
			
			
			\DB::table('contatos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'tp_contato' => 'CP',
					'ds_contato' => '(62)33885724',
				),
			));
			
			\DB::table('contato_paciente')->insert(array (
				0 => 
				array (
					'contato_id' => $numero,
					'paciente_id' => $numero,
				),
			));
			
			
			\DB::table('documentos')->insert(array (
				0 => 
				array (
					'id' => $numero,
					'tp_documento' => 'CNH',
					'te_documento' => '3234235',
				),
			));
			
			\DB::table('documento_paciente')->insert(array (
				0 => 
				array (
					'documento_id' => $numero,
					'paciente_id' => $numero,
				),
			));
		}
    }
}
