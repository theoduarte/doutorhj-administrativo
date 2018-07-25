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
        DB::table('tipoatendimentos')->delete();
        
        DB::table('tipoatendimentos')->insert(array (
            0 =>
            array (
                'id'             => '1',
                'cd_atendimento' => '1',
                'ds_atendimento' => 'Consulta Médica',
            ),
            1 =>
            array (
                'id'             => '2',
                'cd_atendimento' => '2',
                'ds_tipo' => 'Consulta Odontológica',
            ),
            2 =>
            array (
                'id'             => '3',
                'cd_atendimento' => '3',
                'ds_tipo' => 'Exames',
            ),
            3 =>
            array (
                'id'             => '4',
                'cd_atendimento' => '4',
                'ds_tipo' => 'Procedimentos',
            ),
        ));
    }
}