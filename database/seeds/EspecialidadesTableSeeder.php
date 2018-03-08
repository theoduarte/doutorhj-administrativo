<?php

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('especialidades')->delete();
        
        \DB::table('especialidades')->insert(array (
            0 => 
            array (
                'id' => '181',
                'cd_especialidade' => '100',
                'ds_especialidade' => 'ACUPUNTURA',
            ),
            1 => 
            array (
                'id' => '182',
                'cd_especialidade' => '101',
                'ds_especialidade' => 'ALERGIA E IMUNOLOGIA',
            ),
            2 => 
            array (
                'id' => '183',
                'cd_especialidade' => '102',
                'ds_especialidade' => 'ANESTESIOLOGIA',
            ),
            3 => 
            array (
                'id' => '184',
                'cd_especialidade' => '103',
                'ds_especialidade' => 'ANGIOLOGIA',
            ),
            4 => 
            array (
                'id' => '185',
                'cd_especialidade' => '104',
            'ds_especialidade' => 'CANCEROLOGIA (ONCOLOGIA)',
            ),
            5 => 
            array (
                'id' => '186',
                'cd_especialidade' => '110',
                'ds_especialidade' => 'CARDIOLOGIA',
            ),
            6 => 
            array (
                'id' => '187',
                'cd_especialidade' => '106',
                'ds_especialidade' => 'CIRURGIA CARDIOVASCULAR',
            ),
            7 => 
            array (
                'id' => '188',
                'cd_especialidade' => '107',
                'ds_especialidade' => 'CIRURGIA DA MÃO',
            ),
            8 => 
            array (
                'id' => '189',
                'cd_especialidade' => '108',
                'ds_especialidade' => 'CIRURGIA DE CABEÇA E PESCOÇO',
            ),
            9 => 
            array (
                'id' => '190',
                'cd_especialidade' => '109',
                'ds_especialidade' => 'CIRURGIA DO APARELHO DIGESTIVO',
            ),
            10 => 
            array (
                'id' => '191',
                'cd_especialidade' => '110',
                'ds_especialidade' => 'CIRURGIA GERAL',
            ),
            11 => 
            array (
                'id' => '192',
                'cd_especialidade' => '111',
                'ds_especialidade' => 'CIRURGIA PEDIÁTRICA',
            ),
            12 => 
            array (
                'id' => '193',
                'cd_especialidade' => '112',
                'ds_especialidade' => 'CIRURGIA PLÁSTICA',
            ),
            13 => 
            array (
                'id' => '194',
                'cd_especialidade' => '113',
                'ds_especialidade' => 'CIRURGIA TORÁCICA',
            ),
            14 => 
            array (
                'id' => '195',
                'cd_especialidade' => '114',
                'ds_especialidade' => 'CIRURGIA VASCULAR',
            ),
            15 => 
            array (
                'id' => '196',
                'cd_especialidade' => '115',
            'ds_especialidade' => 'CLÍNICA MÉDICA (MEDICINA INTERNA)',
            ),
            16 => 
            array (
                'id' => '197',
                'cd_especialidade' => '116',
                'ds_especialidade' => 'COLOPROCTOLOGIA',
            ),
            17 => 
            array (
                'id' => '198',
                'cd_especialidade' => '117',
                'ds_especialidade' => 'DERMATOLOGIA',
            ),
            18 => 
            array (
                'id' => '199',
                'cd_especialidade' => '118',
                'ds_especialidade' => 'ENDOCRINOLOGIA E METABOLOGIA',
            ),
            19 => 
            array (
                'id' => '200',
                'cd_especialidade' => '119',
                'ds_especialidade' => 'ENDOSCOPIA',
            ),
            20 => 
            array (
                'id' => '201',
                'cd_especialidade' => '120',
                'ds_especialidade' => 'GASTROENTEROLOGIA',
            ),
            21 => 
            array (
                'id' => '202',
                'cd_especialidade' => '121',
                'ds_especialidade' => 'GENÉTICA MÉDICA',
            ),
            22 => 
            array (
                'id' => '203',
                'cd_especialidade' => '122',
                'ds_especialidade' => 'GERIATRIA',
            ),
            23 => 
            array (
                'id' => '204',
                'cd_especialidade' => '123',
                'ds_especialidade' => 'GINECOLOGIA E OBSTETRÍCIA',
            ),
            24 => 
            array (
                'id' => '205',
                'cd_especialidade' => '124',
                'ds_especialidade' => 'HEMATOLOGIA E HEMOTERAPIA',
            ),
            25 => 
            array (
                'id' => '206',
                'cd_especialidade' => '125',
                'ds_especialidade' => 'INFECTOLOGIA',
            ),
            26 => 
            array (
                'id' => '207',
                'cd_especialidade' => '125',
                'ds_especialidade' => 'MASTOLOGIA',
            ),
            27 => 
            array (
                'id' => '208',
                'cd_especialidade' => '127',
                'ds_especialidade' => 'MEDICINA DE FAMÍLIA E COMUNIDADE',
            ),
            28 => 
            array (
                'id' => '209',
                'cd_especialidade' => '128',
                'ds_especialidade' => 'MEDICINA DO TRABALHO',
            ),
            29 => 
            array (
                'id' => '210',
                'cd_especialidade' => '129',
                'ds_especialidade' => 'MEDICINA DO TRÁFEGO',
            ),
            30 => 
            array (
                'id' => '211',
                'cd_especialidade' => '130',
                'ds_especialidade' => 'MEDICINA FÍSICA E REABILITAÇÃO',
            ),
            31 => 
            array (
                'id' => '212',
                'cd_especialidade' => '131',
                'ds_especialidade' => 'MEDICINA INTENSIVA',
            ),
            32 => 
            array (
                'id' => '213',
                'cd_especialidade' => '132',
            'ds_especialidade' => 'MEDICINA LEGAL E PERÍCIA MÉDICA (OU MEDICINA FORENSE)',
            ),
            33 => 
            array (
                'id' => '214',
                'cd_especialidade' => '133',
                'ds_especialidade' => 'MEDICINA NUCLEAR',
            ),
            34 => 
            array (
                'id' => '215',
                'cd_especialidade' => '134',
                'ds_especialidade' => 'MEDICINA PREVENTIVA E SOCIAL',
            ),
            35 => 
            array (
                'id' => '216',
                'cd_especialidade' => '135',
                'ds_especialidade' => 'NEFROLOGIA',
            ),
            36 => 
            array (
                'id' => '217',
                'cd_especialidade' => '136',
                'ds_especialidade' => 'NEUROCIRURGIA',
            ),
            37 => 
            array (
                'id' => '218',
                'cd_especialidade' => '137',
                'ds_especialidade' => 'NEUROLOGIA',
            ),
            38 => 
            array (
                'id' => '219',
                'cd_especialidade' => '138',
                'ds_especialidade' => 'OBSTETRÍCIA',
            ),
            39 => 
            array (
                'id' => '220',
                'cd_especialidade' => '139',
                'ds_especialidade' => 'OFTALMOLOGIA',
            ),
            40 => 
            array (
                'id' => '221',
                'cd_especialidade' => '140',
                'ds_especialidade' => 'ORTOPEDIA E TRAUMATOLOGIA',
            ),
            41 => 
            array (
                'id' => '222',
                'cd_especialidade' => '141',
                'ds_especialidade' => 'MEDICINA ESPORTIVA',
            ),
            42 => 
            array (
                'id' => '223',
                'cd_especialidade' => '142',
                'ds_especialidade' => 'OTORRINOLARINGOLOGIA',
            ),
            43 => 
            array (
                'id' => '224',
                'cd_especialidade' => '143',
                'ds_especialidade' => 'PATOLOGIA',
            ),
            44 => 
            array (
                'id' => '225',
                'cd_especialidade' => '144',
                'ds_especialidade' => 'PATOLOGIA CLÍNICA/MEDICINA LABORATORIAL',
            ),
            45 => 
            array (
                'id' => '226',
                'cd_especialidade' => '145',
                'ds_especialidade' => 'PEDIATRIA',
            ),
            46 => 
            array (
                'id' => '227',
                'cd_especialidade' => '146',
                'ds_especialidade' => 'PNEUMOLOGIA',
            ),
            47 => 
            array (
                'id' => '228',
                'cd_especialidade' => '147',
                'ds_especialidade' => 'PSIQUIATRIA',
            ),
            48 => 
            array (
                'id' => '229',
                'cd_especialidade' => '148',
                'ds_especialidade' => 'RADIOLOGIA E DIAGNÓSTICO POR IMAGEM',
            ),
            49 => 
            array (
                'id' => '230',
                'cd_especialidade' => '149',
                'ds_especialidade' => 'RADIOTERAPIA',
            ),
            50 => 
            array (
                'id' => '231',
                'cd_especialidade' => '150',
                'ds_especialidade' => 'REUMATOLOGIA',
            ),
            51 => 
            array (
                'id' => '232',
                'cd_especialidade' => '151',
                'ds_especialidade' => 'UROLOGIA',
            ),
        ));
        
        
    }
}