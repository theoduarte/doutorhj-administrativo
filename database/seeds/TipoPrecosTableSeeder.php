<?php

use Illuminate\Database\Seeder;

class TipoPrecosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_precos')->delete();
        
        \DB::table('tipo_precos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descricao' => 'Individual',
                'created_at' => '2018-09-05 17:05:17',
                'updated_at' => '2018-09-05 17:05:17',
            ),
            1 => 
            array (
                'id' => 2,
                'descricao' => 'Checkup',
                'created_at' => '2018-09-05 17:05:21',
                'updated_at' => '2018-09-05 17:05:21',
            ),
        ));
        
        
    }
}