<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('requisitos')->delete();
        
        DB::table('requisitos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'TEAMB em Alergia e Imunologia',
                'created_at' => '2018-11-04 17:06:16',
                'updated_at' => '2018-11-04 17:06:16',
            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => 'TEAMB em Pediatria',
                'created_at' => '2018-11-04 17:06:27',
                'updated_at' => '2018-11-04 17:06:27',
            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => 'TEAMB em Angiologia',
                'created_at' => '2018-11-04 17:30:32',
                'updated_at' => '2018-11-04 17:30:32',
            ),
            3 => 
            array (
                'id' => 4,
                'titulo' => 'TEAMB em Cirurgia Vascular',
                'created_at' => '2018-11-04 17:30:59',
                'updated_at' => '2018-11-04 17:30:59',
            ),
            4 => 
            array (
                'id' => 5,
                'titulo' => 'TEAMB em Radiologia e Diagnóstico por Imagem',
                'created_at' => '2018-11-04 17:31:19',
                'updated_at' => '2018-11-04 17:31:19',
            ),
            5 => 
            array (
                'id' => 6,
                'titulo' => 'TEAMB em Cirurgia Plástica',
                'created_at' => '2018-11-04 17:31:36',
                'updated_at' => '2018-11-04 17:31:36',
            ),
            6 => 
            array (
                'id' => 7,
                'titulo' => 'TEAMB em Cardiologia',
                'created_at' => '2018-11-04 17:32:00',
                'updated_at' => '2018-11-04 17:32:00',
            ),
            7 => 
            array (
                'id' => 8,
                'titulo' => 'TEAMB em Cirurgia do Aparelho Digestivo',
                'created_at' => '2018-11-04 17:32:22',
                'updated_at' => '2018-11-04 17:32:22',
            ),
            8 => 
            array (
                'id' => 9,
                'titulo' => 'TEAMB em Cirurgia Geral',
                'created_at' => '2018-11-04 17:32:32',
                'updated_at' => '2018-11-04 17:32:32',
            ),
            9 => 
            array (
                'id' => 10,
                'titulo' => 'TEAMB em Cirurgia de Cabeça e Pescoço',
                'created_at' => '2018-11-04 17:32:56',
                'updated_at' => '2018-11-04 17:32:56',
            ),
            10 => 
            array (
                'id' => 11,
                'titulo' => 'TEAMB em Otorrinolaringologia',
                'created_at' => '2018-11-04 17:33:11',
                'updated_at' => '2018-11-04 17:33:11',
            ),
        ));
        
        
    }
}