<?php

use Illuminate\Database\Seeder;

class ConsultasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('consultas')->delete();
        
        \DB::table('consultas')->insert(array (
            0 => 
            array (
                'id' => '81',
                'cd_consulta' => '10109901',
            'ds_consulta' => 'Consulta Acupuntura (em consultorio)						',
            ),
            1 => 
            array (
                'id' => '82',
                'cd_consulta' => '10109902',
            'ds_consulta' => 'Consulta Alergista e Imunologista (em consultorio)',
            ),
            2 => 
            array (
                'id' => '83',
                'cd_consulta' => '10109903',
            'ds_consulta' => 'Consulta Alergista e Imunologista Pediatra (em consultorio)',
            ),
            3 => 
            array (
                'id' => '84',
                'cd_consulta' => '10109904',
            'ds_consulta' => 'Consulta Anestesiologista (em consultorio)',
            ),
            4 => 
            array (
                'id' => '85',
                'cd_consulta' => '10109905',
            'ds_consulta' => 'Consulta Angiologia (em consultorio)',
            ),
            5 => 
            array (
                'id' => '86',
                'cd_consulta' => '10109906',
            'ds_consulta' => 'Consulta Cancerologia (em consultorio)',
            ),
            6 => 
            array (
                'id' => '87',
                'cd_consulta' => '10109907',
            'ds_consulta' => 'Consulta Cardiologia (em consultorio)',
            ),
            7 => 
            array (
                'id' => '88',
                'cd_consulta' => '10109908',
            'ds_consulta' => 'Consulta Cardiologia Pediatrica (em consultorio)',
            ),
            8 => 
            array (
                'id' => '89',
                'cd_consulta' => '10109909',
            'ds_consulta' => 'Consulta Cirurgia Cardiovascular (em consultorio)',
            ),
            9 => 
            array (
                'id' => '90',
                'cd_consulta' => '10109910',
            'ds_consulta' => 'Consulta Cirurgia Cranio-Maxilo-Facial (em consultorio)',
            ),
            10 => 
            array (
                'id' => '91',
                'cd_consulta' => '10109911',
            'ds_consulta' => 'Consulta Cirurgia de Cabeça e Pescoço (em consultorio)',
            ),
            11 => 
            array (
                'id' => '92',
                'cd_consulta' => '10109912',
            'ds_consulta' => 'Consulta Cirurgia Geral (em consultorio)',
            ),
            12 => 
            array (
                'id' => '93',
                'cd_consulta' => '10109913',
            'ds_consulta' => 'Consulta Cirurgia Oncologica (em consultorio)',
            ),
            13 => 
            array (
                'id' => '94',
                'cd_consulta' => '10109914',
            'ds_consulta' => 'Consulta Cirurgia Oncologica Pediatrica (em consultorio)',
            ),
            14 => 
            array (
                'id' => '95',
                'cd_consulta' => '10109915',
                'ds_consulta' => 'Consulta Cirurgia Pediatrica',
            ),
            15 => 
            array (
                'id' => '96',
                'cd_consulta' => '10109916',
            'ds_consulta' => 'Consulta Cirurgia Plastica  (em consultorio)',
            ),
            16 => 
            array (
                'id' => '97',
                'cd_consulta' => '10109917',
            'ds_consulta' => 'Consulta Cirurgia Toracica (em consultorio)',
            ),
            17 => 
            array (
                'id' => '98',
                'cd_consulta' => '10109918',
            'ds_consulta' => 'Consulta Cirurgia Vascular  (em consultorio)',
            ),
            18 => 
            array (
                'id' => '99',
                'cd_consulta' => '10109919',
            'ds_consulta' => 'Consulta Cirurgia da Mao (em consultorio)',
            ),
            19 => 
            array (
                'id' => '100',
                'cd_consulta' => '10109920',
            'ds_consulta' => 'Consulta Cirurgia do Aparelho Digestivo (em consultorio)',
            ),
            20 => 
            array (
                'id' => '101',
                'cd_consulta' => '10109921',
            'ds_consulta' => 'Consulta Clinica Medica/Geral (em consultorio)',
            ),
            21 => 
            array (
                'id' => '102',
                'cd_consulta' => '10109922',
            'ds_consulta' => 'Consulta Coloproctologia (em consultorio)',
            ),
            22 => 
            array (
                'id' => '103',
                'cd_consulta' => '10109923',
            'ds_consulta' => 'Consulta Coloproctologia Pediatrica  (em consultorio)',
            ),
            23 => 
            array (
                'id' => '104',
                'cd_consulta' => '10109924',
            'ds_consulta' => 'Consulta Dermatologia (em consultorio)',
            ),
            24 => 
            array (
                'id' => '105',
                'cd_consulta' => '10109925',
            'ds_consulta' => 'Consulta Dermatologia Pediatrica (em consultorio)',
            ),
            25 => 
            array (
                'id' => '106',
                'cd_consulta' => '10109926',
            'ds_consulta' => 'Consulta Endocrinologia e Metabologia (em consultorio)',
            ),
            26 => 
            array (
                'id' => '107',
                'cd_consulta' => '10109927',
            'ds_consulta' => 'Consulta Endocrinologia e Metab Pediatrica (em consultorio)',
            ),
            27 => 
            array (
                'id' => '108',
                'cd_consulta' => '10109928',
            'ds_consulta' => 'Consulta Gastroenterologia (em consultorio)',
            ),
            28 => 
            array (
                'id' => '109',
                'cd_consulta' => '10109929',
            'ds_consulta' => 'Consulta Gastroenterologia Pediatrica  (em consultorio)',
            ),
            29 => 
            array (
                'id' => '110',
                'cd_consulta' => '10109930',
            'ds_consulta' => 'Consulta Geriatria (em consultorio)',
            ),
            30 => 
            array (
                'id' => '111',
                'cd_consulta' => '10109931',
            'ds_consulta' => 'Consulta Ginecologia e Obstetricia (em consultorio)',
            ),
            31 => 
            array (
                'id' => '112',
                'cd_consulta' => '10109932',
            'ds_consulta' => 'Consulta Ginecologia Pediatrica (em consultorio)',
            ),
            32 => 
            array (
                'id' => '113',
                'cd_consulta' => '10109933',
            'ds_consulta' => 'Consulta Hematologia e Hemoterapia (em consultorio)',
            ),
            33 => 
            array (
                'id' => '114',
                'cd_consulta' => '10109934',
            'ds_consulta' => 'Consulta Hematologia e Hemot Pediatrica  (em consultorio)',
            ),
            34 => 
            array (
                'id' => '115',
                'cd_consulta' => '10109935',
            'ds_consulta' => 'Consulta Hepatologia (em consultorio)',
            ),
            35 => 
            array (
                'id' => '116',
                'cd_consulta' => '10109936',
            'ds_consulta' => 'Consulta Hepatologia Pediatrica (em consultorio)',
            ),
            36 => 
            array (
                'id' => '117',
                'cd_consulta' => '10109937',
            'ds_consulta' => 'Consulta Homeopatia (em consultorio)',
            ),
            37 => 
            array (
                'id' => '118',
                'cd_consulta' => '10109938',
            'ds_consulta' => 'Consulta Homeopatia Pediatrica (em consultorio)',
            ),
            38 => 
            array (
                'id' => '119',
                'cd_consulta' => '10109939',
            'ds_consulta' => 'Consulta Infectologia (em consultorio)',
            ),
            39 => 
            array (
                'id' => '120',
                'cd_consulta' => '10109940',
            'ds_consulta' => 'Consulta Infectologia Pediatrica (em consultorio)',
            ),
            40 => 
            array (
                'id' => '121',
                'cd_consulta' => '10109941',
            'ds_consulta' => 'Consulta Mastologia (em consultorio)',
            ),
            41 => 
            array (
                'id' => '122',
                'cd_consulta' => '10109942',
            'ds_consulta' => 'Consulta Medicina do Trabalho (em consultorio)',
            ),
            42 => 
            array (
                'id' => '123',
                'cd_consulta' => '10109943',
            'ds_consulta' => 'Consulta Nefrologia (em consultorio)',
            ),
            43 => 
            array (
                'id' => '124',
                'cd_consulta' => '10109944',
            'ds_consulta' => 'Consulta Nefrologia Pediatrica (em consultorio)',
            ),
            44 => 
            array (
                'id' => '125',
                'cd_consulta' => '10109945',
            'ds_consulta' => 'Consulta Neurocirurgia (em consultorio)',
            ),
            45 => 
            array (
                'id' => '126',
                'cd_consulta' => '10109946',
            'ds_consulta' => 'Consulta Neurocirurgia Pediatrica  (em consultorio)',
            ),
            46 => 
            array (
                'id' => '127',
                'cd_consulta' => '10109947',
            'ds_consulta' => 'Consulta Neurologia (em consultorio)',
            ),
            47 => 
            array (
                'id' => '128',
                'cd_consulta' => '10109948',
            'ds_consulta' => 'Consulta Neurologia Pediatrica (em consultorio)',
            ),
            48 => 
            array (
                'id' => '129',
                'cd_consulta' => '10109949',
            'ds_consulta' => 'Consulta Nutrologia (em consultorio)',
            ),
            49 => 
            array (
                'id' => '130',
                'cd_consulta' => '10109950',
            'ds_consulta' => 'Consulta Nutrologia Pediatrica (em consultorio)',
            ),
            50 => 
            array (
                'id' => '131',
                'cd_consulta' => '10109951',
            'ds_consulta' => 'Consulta Oftalmologia (em consultorio)',
            ),
            51 => 
            array (
                'id' => '132',
                'cd_consulta' => '10109952',
            'ds_consulta' => 'Consulta Oftalmologia Pediatrica (em consultorio)',
            ),
            52 => 
            array (
                'id' => '133',
                'cd_consulta' => '10109953',
            'ds_consulta' => 'Consulta Oncologia Clinica (em consultorio)',
            ),
            53 => 
            array (
                'id' => '134',
                'cd_consulta' => '10109954',
            'ds_consulta' => 'Consulta Oncologia Clinica Pediatrica (em consultorio)',
            ),
            54 => 
            array (
                'id' => '135',
                'cd_consulta' => '10109955',
            'ds_consulta' => 'Consulta Ortopedia e Traumatologia (em consultorio)',
            ),
            55 => 
            array (
                'id' => '136',
                'cd_consulta' => '10109956',
            'ds_consulta' => 'Consulta Ortopedia e Traumatologia Pediatric(em consultorio)',
            ),
            56 => 
            array (
                'id' => '137',
                'cd_consulta' => '10109957',
            'ds_consulta' => 'Consulta Otorrinolaringologia (em consultorio)',
            ),
            57 => 
            array (
                'id' => '138',
                'cd_consulta' => '10109958',
            'ds_consulta' => 'Consulta Otorrinolaringologia Pediatrica (em consultorio)',
            ),
            58 => 
            array (
                'id' => '139',
                'cd_consulta' => '10109959',
            'ds_consulta' => 'Consulta Pediatria (em consultorio)',
            ),
            59 => 
            array (
                'id' => '140',
                'cd_consulta' => '10109960',
            'ds_consulta' => 'Consulta Pneumologia (em consultorio)',
            ),
            60 => 
            array (
                'id' => '141',
                'cd_consulta' => '10109961',
            'ds_consulta' => 'Consulta Pneumologia Pediatrica (em consultorio)',
            ),
            61 => 
            array (
                'id' => '142',
                'cd_consulta' => '10109962',
            'ds_consulta' => 'Consulta Psiquiatria (em consultorio)',
            ),
            62 => 
            array (
                'id' => '143',
                'cd_consulta' => '10109963',
            'ds_consulta' => 'Consulta Psiquiatria da Infancia e Adolescen(em consultorio)',
            ),
            63 => 
            array (
                'id' => '144',
                'cd_consulta' => '10109964',
            'ds_consulta' => 'Consulta Radioterapeuta/Radioterapia (em consultorio)',
            ),
            64 => 
            array (
                'id' => '145',
                'cd_consulta' => '10109965',
            'ds_consulta' => 'Consulta Reumatologia (em consultorio)',
            ),
            65 => 
            array (
                'id' => '146',
                'cd_consulta' => '10109966',
            'ds_consulta' => 'Consulta Reumatologia Pediatrica (em consultorio)',
            ),
            66 => 
            array (
                'id' => '147',
                'cd_consulta' => '10109967',
            'ds_consulta' => 'Consulta Urologia (em consultorio)',
            ),
            67 => 
            array (
                'id' => '148',
                'cd_consulta' => '10109968',
            'ds_consulta' => 'Consulta Urologia Pediatrica (em consultorio)',
            ),
            68 => 
            array (
                'id' => '149',
                'cd_consulta' => '10109969',
            'ds_consulta' => 'Consulta Cirurgia Cardiologia (em pronto-socorro)',
            ),
            69 => 
            array (
                'id' => '150',
                'cd_consulta' => '10109970',
            'ds_consulta' => 'Consulta Cirurgia Geral (em pronto-socorro)',
            ),
            70 => 
            array (
                'id' => '151',
                'cd_consulta' => '10109971',
            'ds_consulta' => 'Consulta Clínica Médica (em consultorio)',
            ),
            71 => 
            array (
                'id' => '152',
                'cd_consulta' => '10109972',
            'ds_consulta' => 'Consulta Ginecologia/Obstetricia (em pronto-socorro)',
            ),
            72 => 
            array (
                'id' => '153',
                'cd_consulta' => '10109973',
            'ds_consulta' => 'Consulta Ortopedia (em pronto-socorro)',
            ),
            73 => 
            array (
                'id' => '154',
                'cd_consulta' => '10109974',
            'ds_consulta' => 'Consulta Otorrinolaringologia (em pronto-socorro)',
            ),
            74 => 
            array (
                'id' => '155',
                'cd_consulta' => '10109975',
            'ds_consulta' => 'Consulta Pediatria (em pronto-socorro)',
            ),
            75 => 
            array (
                'id' => '156',
                'cd_consulta' => '10109978',
            'ds_consulta' => 'Consulta Neonatologia (em consultorio)',
            ),
        ));
        
        
    }
}