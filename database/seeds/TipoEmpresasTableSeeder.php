<?php

use Illuminate\Database\Seeder;

class TipoEmpresasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipo_empresas')->delete();
        
        \DB::table('tipo_empresas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'descricao' => 'Sociedade Empresária Limitada',
                'abreviacao' => 'Ltda',
                'created_at' => '2018-09-20 14:56:22',
                'updated_at' => '2018-09-20 14:56:22',
            ),
            1 => 
            array (
                'id' => 2,
                'descricao' => 'Empresa Individual de Responsabilidade Limitada',
                'abreviacao' => 'EIRELI',
                'created_at' => '2018-09-20 14:56:48',
                'updated_at' => '2018-09-20 14:56:48',
            ),
            2 => 
            array (
                'id' => 3,
                'descricao' => 'Empresa Individual',
                'abreviacao' => 'EI',
                'created_at' => '2018-09-20 14:56:58',
                'updated_at' => '2018-09-20 14:56:58',
            ),
            3 => 
            array (
                'id' => 4,
                'descricao' => 'Microempreendedor Individual',
                'abreviacao' => 'MEI',
                'created_at' => '2018-09-20 14:57:14',
                'updated_at' => '2018-09-20 14:57:14',
            ),
            4 => 
            array (
                'id' => 5,
                'descricao' => 'Sociedade Simples',
                'abreviacao' => 'SS',
                'created_at' => '2018-09-20 14:57:25',
                'updated_at' => '2018-09-20 14:57:25',
            ),
            5 => 
            array (
                'id' => 6,
                'descricao' => 'Sociedade Anônima',
                'abreviacao' => 'SA',
                'created_at' => '2018-09-20 14:57:40',
                'updated_at' => '2018-09-20 14:57:40',
            ),
        ));
        
        
    }
}