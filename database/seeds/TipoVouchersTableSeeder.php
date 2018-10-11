<?php

use Illuminate\Database\Seeder;

class TipoVouchersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_vouchers')->delete();
        
        \DB::table('tipo_vouchers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descricao' => 'Plano',
                'created_at' => '2018-09-05 17:04:27',
                'updated_at' => '2018-09-05 17:04:27',
            ),
            1 => 
            array (
                'id' => 2,
                'descricao' => 'Avulso',
                'created_at' => '2018-09-05 17:04:31',
                'updated_at' => '2018-09-05 17:04:31',
            ),
        ));
        
        
    }
}