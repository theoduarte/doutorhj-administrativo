<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaAtuacaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area_atuacaos')->delete();
        
        DB::table('area_atuacaos')->insert(
            array(
                0 => array(
                    'id' => '1',
                    'titulo' => 'Administração em Saúde',
                    'cs_status' => 'A'
                ),
                1 => array(
                    'id' => '2',
                    'titulo' => 'Alergia e Imunologia Pediátrica',
                    'cs_status' => 'A'
                ),
                2 => array(
                    'id' => '3',
                    'titulo' => 'Angiorradiologia e Cirurgia Endovascular',
                    'cs_status' => 'A'
                ),
                3 => array(
                    'id' => '4',
                    'titulo' => 'Atendimento ao Queimado',
                    'cs_status' => 'A'
                ),
                4 => array(
                    'id' => '5',
                    'titulo' => 'Cardiologia Pediátrica',
                    'cs_status' => 'A'
                ),
                5 => array(
                    'id' => '6',
                    'titulo' => 'Cirurgia Bariátrica',
                    'cs_status' => 'A'
                ),
                6 => array(
                    'id' => '7',
                    'titulo' => 'Cirurgia Crânio-Maxilo-Facia',
                    'cs_status' => 'A'
                ),
                7 => array(
                    'id' => '8',
                    'titulo' => 'Cirurgia do Trauma',
                    'cs_status' => 'A'
                ),
                8 => array(
                    'id' => '9',
                    'titulo' => 'Cirurgia Videolaparoscópica',
                    'cs_status' => 'A'
                ),
                9 => array(
                    'id' => '10',
                    'titulo' => 'Citopatologia',
                    'cs_status' => 'A'
                ),
                10 => array(
                    'id' => '11',
                    'titulo' => 'Densitometria Óssea',
                    'cs_status' => 'A'
                ),
                11 => array(
                    'id' => '12',
                    'titulo' => 'Dor',
                    'cs_status' => 'A'
                ),
                12 => array(
                    'id' => '13',
                    'titulo' => 'Ecocardiografia',
                    'cs_status' => 'A'
                ),
                13 => array(
                    'id' => '14',
                    'titulo' => 'Ecografia Vascular com Doppler',
                    'cs_status' => 'A'
                ),
                14 => array(
                    'id' => '15',
                    'titulo' => 'Eletrofisiologia Clínica Invasiva',
                    'cs_status' => 'A'
                ),
                15 => array(
                    'id' => '16',
                    'titulo' => 'Emergência Pediátrica',
                    'cs_status' => 'A'
                ),
                16 => array(
                    'id' => '17',
                    'titulo' => 'Endocrinologia Pediátrica',
                    'cs_status' => 'A'
                ),
                17 => array(
                    'id' => '18',
                    'titulo' => 'Endoscopia Digestiva',
                    'cs_status' => 'A'
                ),
                18 => array(
                    'id' => '19',
                    'titulo' => 'Endoscopia Ginecológica',
                    'cs_status' => 'A'
                ),
                19 => array(
                    'id' => '20',
                    'titulo' => 'Endoscopia Respiratória',
                    'cs_status' => 'A'
                ),
                20 => array(
                    'id' => '21',
                    'titulo' => 'Ergometria',
                    'cs_status' => 'A'
                ),
                21 => array(
                    'id' => '22',
                    'titulo' => 'Estimulação Cardíaca Eletrônica Implantável',
                    'cs_status' => 'A'
                ),
                22 => array(
                    'id' => '23',
                    'titulo' => 'Foniatria',
                    'cs_status' => 'A'
                ),
                23 => array(
                    'id' => '24',
                    'titulo' => 'Gastroenterologia Pediátrica',
                    'cs_status' => 'A'
                ),
                24 => array(
                    'id' => '25',
                    'titulo' => 'Hansenologia',
                    'cs_status' => 'A'
                ),
                25 => array(
                    'id' => '26',
                    'titulo' => 'Hematologia e Hemoterapia Pediátrica',
                    'cs_status' => 'A'
                ),
                26 => array(
                    'id' => '27',
                    'titulo' => 'Hemodinâmica e Cardiologia Intervencionista',
                    'cs_status' => 'A'
                ),
                27 => array(
                    'id' => '28',
                    'titulo' => 'Hepatologia',
                    'cs_status' => 'A'
                ),
                28 => array(
                    'id' => '29',
                    'titulo' => 'Infectologia Hospitalar',
                    'cs_status' => 'A'
                ),
                29 => array(
                    'id' => '30',
                    'titulo' => 'Infectologia Pediátrica',
                    'cs_status' => 'A'
                ),
                30 => array(
                    'id' => '31',
                    'titulo' => 'Mamografia',
                    'cs_status' => 'A'
                ),
                31 => array(
                    'id' => '32',
                    'titulo' => 'Medicina de Urgência',
                    'cs_status' => 'A'
                ),
                32 => array(
                    'id' => '33',
                    'titulo' => 'Medicina do Adolescente',
                    'cs_status' => 'A'
                ),
                33 => array(
                    'id' => '34',
                    'titulo' => 'Medicina do Sono',
                    'cs_status' => 'A'
                ),
                34 => array(
                    'id' => '35',
                    'titulo' => 'Medicina Fetal',
                    'cs_status' => 'A'
                ),
                35 => array(
                    'id' => '36',
                    'titulo' => 'Medicina IntensivaPediátrica',
                    'cs_status' => 'A'
                ),
                36 => array(
                    'id' => '37',
                    'titulo' => 'Medicina Paliativa',
                    'cs_status' => 'A'
                ),
                37 => array(
                    'id' => '38',
                    'titulo' => 'Medicina Tropical',
                    'cs_status' => 'A'
                ),
                38 => array(
                    'id' => '39',
                    'titulo' => 'Nefrologia Pediátrica',
                    'cs_status' => 'A'
                ),
                39 => array(
                    'id' => '40',
                    'titulo' => 'Neonatologia',
                    'cs_status' => 'A'
                ),
                40 => array(
                    'id' => '41',
                    'titulo' => 'Neurofisiologia Clínica',
                    'cs_status' => 'A'
                ),
                41 => array(
                    'id' => '42',
                    'titulo' => 'Neurologia Pediátrica',
                    'cs_status' => 'A'
                ),
                42 => array(
                    'id' => '43',
                    'titulo' => 'Neurorradiologia',
                    'cs_status' => 'A'
                ),
                43 => array(
                    'id' => '44',
                    'titulo' => 'Nutrição Parenteral e Enteral',
                    'cs_status' => 'A'
                ),
                44 => array(
                    'id' => '45',
                    'titulo' => 'Nutrição Parenteral e Enteral Pediátrica',
                    'cs_status' => 'A'
                ),
                45 => array(
                    'id' => '46',
                    'titulo' => 'Nutrologia Pediátrica',
                    'cs_status' => 'A'
                ),
                46 => array(
                    'id' => '47',
                    'titulo' => 'Oncologia Pediátrica',
                    'cs_status' => 'A'
                ),
                47 => array(
                    'id' => '48',
                    'titulo' => 'Pneumologia Pediátrica',
                    'cs_status' => 'A'
                ),
                48 => array(
                    'id' => '49',
                    'titulo' => 'Psicogeriatria',
                    'cs_status' => 'A'
                ),
                49 => array(
                    'id' => '50',
                    'titulo' => 'Psicoterapia',
                    'cs_status' => 'A'
                ),
                50 => array(
                    'id' => '51',
                    'titulo' => 'Psiquiatria da Infância e Adolescência',
                    'cs_status' => 'A'
                ),
                51 => array(
                    'id' => '52',
                    'titulo' => 'Psiquiatria Forense',
                    'cs_status' => 'A'
                ),
                52 => array(
                    'id' => '53',
                    'titulo' => 'Radiologia Intervencionista e Angiorradiologia',
                    'cs_status' => 'A'
                ),
                53 => array(
                    'id' => '54',
                    'titulo' => 'Reprodução Assistida',
                    'cs_status' => 'A'
                ),
                54 => array(
                    'id' => '55',
                    'titulo' => 'Reumatologia Pediátrica',
                    'cs_status' => 'A'
                ),
                55 => array(
                    'id' => '56',
                    'titulo' => 'Sexologia',
                    'cs_status' => 'A'
                ),
                56 => array(
                    'id' => '57',
                    'titulo' => 'Toxicologia Médica',
                    'cs_status' => 'A'
                ),
                57 => array(
                    'id' => '58',
                    'titulo' => 'Transplante de Medula Óssea',
                    'cs_status' => 'A'
                ),
                58 => array(
                    'id' => '59',
                    'titulo' => 'Ultrassonografia em Ginecologia e Obstetrícia',
                    'cs_status' => 'A'
                )
             )
        );
    }
}
