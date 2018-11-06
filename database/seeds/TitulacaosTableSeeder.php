<?php

use Illuminate\Database\Seeder;

class TitulacaosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('titulacaos')->delete();
        
        \DB::table('titulacaos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'ACUPUNTURA',
                'tempo_formacao' => 24,
                'amb' => 'Concurso do Convênio AMB/ Colégio Médico de Acupuntura',
                'cnrm' => 'Programa de Residência Médica em Acupuntura',
                'created_at' => '2018-11-05 14:53:07',
                'updated_at' => '2018-11-05 14:53:07',
            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => 'ALERGIA e IMUNOLOGIA',
                'tempo_formacao' => 24,
                'amb' => 'Concurso do Convênio AMB/ Associação Brasileira de Alergia e Imunopatologia',
                'cnrm' => 'Programa de Residência Médica em Alergia e Imunopatologia',
                'created_at' => '2018-11-05 15:08:17',
                'updated_at' => '2018-11-05 15:08:17',
            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => 'ANESTESIOLOGIA',
                'tempo_formacao' => 36,
                'amb' => 'Concurso do Convênio AMB/ Sociedade Brasileira de Anestesiologia',
                'cnrm' => 'Programa de Residência Médica em Anestesiologia',
                'created_at' => '2018-11-05 15:09:34',
                'updated_at' => '2018-11-05 15:09:34',
            ),
        ));
        
        
    }
}