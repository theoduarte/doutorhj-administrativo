<?php

use Illuminate\Database\Seeder;

class TipoCartaosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_cartaos')->delete();
        
        \DB::table('tipo_cartaos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descricao' => 'Individual',
                'created_at' => '2018-09-12 11:13:35',
                'updated_at' => '2018-09-12 11:13:35',
            ),
            1 => 
            array (
                'id' => 2,
                'descricao' => 'Empresarial',
                'created_at' => '2018-09-12 11:13:42',
                'updated_at' => '2018-09-12 11:13:42',
            ),
            2 => 
            array (
                'id' => 3,
                'descricao' => 'Pré-Pago',
                'created_at' => '2018-09-12 11:14:04',
                'updated_at' => '2018-09-12 11:14:04',
            ),
        ));
        
        
    }
}