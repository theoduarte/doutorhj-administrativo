<?php

use Illuminate\Database\Seeder;

class PlanosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('planos')->delete();
        
        \DB::table('planos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cd_plano' => 1,
                'ds_plano' => 'Open',
            ),
            1 => 
            array (
                'id' => 2,
                'cd_plano' => 2,
                'ds_plano' => 'Premium',
            ),
            2 => 
            array (
                'id' => 3,
                'cd_plano' => 3,
                'ds_plano' => 'Blue',
            ),
            3 => 
            array (
                'id' => 4,
                'cd_plano' => 4,
                'ds_plano' => 'Black',
            ),
        ));
        
        
    }
}