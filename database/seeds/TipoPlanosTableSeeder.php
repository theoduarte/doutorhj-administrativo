<?php

use Illuminate\Database\Seeder;

class TipoPlanosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_planos')->delete();
        
        \DB::table('tipo_planos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descricao' => 'Individual',
                'created_at' => '2018-09-05 17:03:52',
                'updated_at' => '2018-09-05 17:03:52',
            ),
            1 => 
            array (
                'id' => 2,
                'descricao' => 'Corporativo',
                'created_at' => '2018-09-05 17:03:58',
                'updated_at' => '2018-09-05 17:03:58',
            ),
            2 => 
            array (
                'id' => 3,
                'descricao' => 'Parceria',
                'created_at' => '2018-09-05 17:06:53',
                'updated_at' => '2018-09-05 17:06:53',
            ),
        ));
        
        
    }
}