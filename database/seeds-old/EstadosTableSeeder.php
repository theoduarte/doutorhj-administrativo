<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estados')->delete();
        
        DB::table('estados')->insert(array (
            0 => 
            array (
                'id' => '1',
                'ds_estado' => 'RONDÔNIA',
                'cd_ibge' => '11',
                'sg_estado' => 'RO',
            ),
            1 => 
            array (
                'id' => '2',
                'ds_estado' => 'ACRE',
                'cd_ibge' => '12',
                'sg_estado' => 'AC',
            ),
            2 => 
            array (
                'id' => '3',
                'ds_estado' => 'AMAZONAS',
                'cd_ibge' => '13',
                'sg_estado' => 'AM',
            ),
            3 => 
            array (
                'id' => '4',
                'ds_estado' => 'RORAIMA',
                'cd_ibge' => '14',
                'sg_estado' => 'RR',
            ),
            4 => 
            array (
                'id' => '5',
                'ds_estado' => 'PARÁ',
                'cd_ibge' => '15',
                'sg_estado' => 'PA',
            ),
            5 => 
            array (
                'id' => '6',
                'ds_estado' => 'AMAPÁ',
                'cd_ibge' => '16',
                'sg_estado' => 'AP',
            ),
            6 => 
            array (
                'id' => '7',
                'ds_estado' => 'TOCANTINS',
                'cd_ibge' => '17',
                'sg_estado' => 'TO',
            ),
            7 => 
            array (
                'id' => '8',
                'ds_estado' => 'MARANHÃO',
                'cd_ibge' => '21',
                'sg_estado' => 'MA',
            ),
            8 => 
            array (
                'id' => '9',
                'ds_estado' => 'PIAUÍ',
                'cd_ibge' => '22',
                'sg_estado' => 'PI',
            ),
            9 => 
            array (
                'id' => '10',
                'ds_estado' => 'CEARÁ',
                'cd_ibge' => '23',
                'sg_estado' => 'CE',
            ),
            10 => 
            array (
                'id' => '11',
                'ds_estado' => 'RIO GRANDE DO NORTE',
                'cd_ibge' => '24',
                'sg_estado' => 'RN',
            ),
            11 => 
            array (
                'id' => '12',
                'ds_estado' => 'PARAÍBA',
                'cd_ibge' => '25',
                'sg_estado' => 'PB',
            ),
            12 => 
            array (
                'id' => '13',
                'ds_estado' => 'PERNAMBUCO',
                'cd_ibge' => '26',
                'sg_estado' => 'PE',
            ),
            13 => 
            array (
                'id' => '14',
                'ds_estado' => 'ALAGOAS',
                'cd_ibge' => '27',
                'sg_estado' => 'AL',
            ),
            14 => 
            array (
                'id' => '15',
                'ds_estado' => 'SERGIPE',
                'cd_ibge' => '28',
                'sg_estado' => 'SE',
            ),
            15 => 
            array (
                'id' => '16',
                'ds_estado' => 'BAHIA',
                'cd_ibge' => '29',
                'sg_estado' => 'BA',
            ),
            16 => 
            array (
                'id' => '17',
                'ds_estado' => 'MINAS GERAIS',
                'cd_ibge' => '31',
                'sg_estado' => 'MG',
            ),
            17 => 
            array (
                'id' => '18',
                'ds_estado' => 'ESPÍRITO SANTO',
                'cd_ibge' => '32',
                'sg_estado' => 'ES',
            ),
            18 => 
            array (
                'id' => '19',
                'ds_estado' => 'RIO DE JANEIRO',
                'cd_ibge' => '33',
                'sg_estado' => 'RJ',
            ),
            19 => 
            array (
                'id' => '20',
                'ds_estado' => 'SÃO PAULO',
                'cd_ibge' => '35',
                'sg_estado' => 'SP',
            ),
            20 => 
            array (
                'id' => '21',
                'ds_estado' => 'PARANÁ',
                'cd_ibge' => '41',
                'sg_estado' => 'PR',
            ),
            21 => 
            array (
                'id' => '22',
                'ds_estado' => 'SANTA CATARINA',
                'cd_ibge' => '42',
                'sg_estado' => 'SC',
            ),
            22 => 
            array (
                'id' => '23',
                'ds_estado' => 'RIO GRANDE DO SUL',
                'cd_ibge' => '43',
                'sg_estado' => 'RS',
            ),
            23 => 
            array (
                'id' => '24',
                'ds_estado' => 'MATO GROSSO DO SUL',
                'cd_ibge' => '50',
                'sg_estado' => 'MS',
            ),
            24 => 
            array (
                'id' => '25',
                'ds_estado' => 'MATO GROSSO',
                'cd_ibge' => '51',
                'sg_estado' => 'MT',
            ),
            25 => 
            array (
                'id' => '26',
                'ds_estado' => 'GOIÁS',
                'cd_ibge' => '52',
                'sg_estado' => 'GO',
            ),
            26 => 
            array (
                'id' => '27',
                'ds_estado' => 'DISTRITO FEDERAL',
                'cd_ibge' => '53',
                'sg_estado' => 'DF',
            ),
        ));
        
        
    }
}