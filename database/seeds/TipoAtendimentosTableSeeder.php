<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAtendimentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipoatendimento')->delete();
        
        DB::table('tipoatendimento')->insert(array (
            0 =>
            array (
                'id'             => '1',
                'cd_atendimento' => '100',
                'ds_atendimento' => 'Consulta Médica',
            ),
            1 =>
            array (
                'id'             => '2',
                'cd_atendimento' => '200',
                'ds_tipo' => 'Consulta Odontológica',
            ),
            2 =>
            array (
                'id'             => '3',
                'cd_atendimento' => '300',
                'ds_tipo' => 'Exames',
            ),
            3 =>
            array (
                'id'             => '4',
                'cd_atendimento' => '400',
                'ds_tipo' => 'Procedimentos',
            ),
        ));
    }
}
