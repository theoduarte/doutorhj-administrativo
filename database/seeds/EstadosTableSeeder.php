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
                'ds_estado' => 'Acre',
                'cd_ibge' => '12',
                'sg_estado' => 'AC',
            ),
            1 => 
            array (
                'id' => '2',
                'ds_estado' => 'Alagoas',
                'cd_ibge' => '27',
                'sg_estado' => 'AL',
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
                'ds_estado' => 'Amapá',
                'cd_ibge' => '16',
                'sg_estado' => 'AP',
            ),
            4 => 
            array (
                'id' => '5',
                'ds_estado' => 'BAhia',
                'cd_ibge' => '29',
                'sg_estado' => 'BA',
            ),
            5 => 
            array (
                'id' => '6',
                'ds_estado' => 'Ceará',
                'cd_ibge' => '23',
                'sg_estado' => 'CE',
            ),
            6 => 
            array (
                'id' => '7',
                'ds_estado' => 'Distrito Federal',
                'cd_ibge' => '53',
                'sg_estado' => 'DF',
            ),
            7 => 
            array (
                'id' => '8',
                'ds_estado' => 'Espírito Santo',
                'cd_ibge' => '32',
                'sg_estado' => 'ES',
            ),
            8 => 
            array (
                'id' => '9',
                'ds_estado' => 'Goiás',
                'cd_ibge' => '52',
                'sg_estado' => 'GO',
            ),
            9 => 
            array (
                'id' => '10',
                'ds_estado' => 'Maranhão',
                'cd_ibge' => '21',
                'sg_estado' => 'MA',
            ),
            10 => 
            array (
                'id' => '11',
                'ds_estado' => 'Minas Gerais',
                'cd_ibge' => '31',
                'sg_estado' => 'MG',
            ),
            11 => 
            array (
                'id' => '12',
                'ds_estado' => 'Mato Grosso do Sul',
                'cd_ibge' => '50',
                'sg_estado' => 'MS',
            ),
            12 => 
            array (
                'id' => '13',
                'ds_estado' => 'Mato Grosso',
                'cd_ibge' => '51',
                'sg_estado' => 'MT',
            ),
            13 => 
            array (
                'id' => '14',
                'ds_estado' => 'Pará',
                'cd_ibge' => '15',
                'sg_estado' => 'PA',
            ),
            14 => 
            array (
                'id' => '15',
                'ds_estado' => 'Paraíba',
                'cd_ibge' => '25',
                'sg_estado' => 'PB',
            ),
            15 => 
            array (
                'id' => '16',
                'ds_estado' => 'Pernambuco',
                'cd_ibge' => '26',
                'sg_estado' => 'PE',
            ),
            16 => 
            array (
                'id' => '17',
                'ds_estado' => 'Piauí',
                'cd_ibge' => '22',
                'sg_estado' => 'PI',
            ),
            17 => 
            array (
                'id' => '18',
                'ds_estado' => 'Paraná',
                'cd_ibge' => '41',
                'sg_estado' => 'PR',
            ),
            18 => 
            array (
                'id' => '19',
                'ds_estado' => 'Rio de Janeiro',
                'cd_ibge' => '33',
                'sg_estado' => 'RJ',
            ),
            19 => 
            array (
                'id' => '20',
                'ds_estado' => 'Rio Grande do Norte',
                'cd_ibge' => '24',
                'sg_estado' => 'RN',
            ),
            20 => 
            array (
                'id' => '21',
                'ds_estado' => 'Rondônia',
                'cd_ibge' => '11',
                'sg_estado' => 'RO',
            ),
            21 => 
            array (
                'id' => '22',
                'ds_estado' => 'Roraima',
                'cd_ibge' => '14',
                'sg_estado' => 'RR',
            ),
            22 => 
            array (
                'id' => '23',
                'ds_estado' => 'Rio Grande do Sul',
                'cd_ibge' => '43',
                'sg_estado' => 'RS',
            ),
            23 => 
            array (
                'id' => '24',
                'ds_estado' => 'Santa Catarina',
                'cd_ibge' => '42',
                'sg_estado' => 'SC',
            ),
            24 => 
            array (
                'id' => '25',
                'ds_estado' => 'Sergipe',
                'cd_ibge' => '28',
                'sg_estado' => 'SE',
            ),
            25 => 
            array (
                'id' => '26',
                'ds_estado' => 'São Paulo',
                'cd_ibge' => '35',
                'sg_estado' => 'SP',
            ),
            26 => 
            array (
                'id' => '27',
                'ds_estado' => 'Tocantins',
                'cd_ibge' => '17',
                'sg_estado' => 'TO',
            ),
        ));
        
        
    }
}