<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('tipo_logs')->get()->count() == 0){
            
            DB::table('tipo_logs')->insert([
                
                [
                    'titulo'                => 'Adicionar Registro',
                ],
                [
                    'titulo'                => 'Consultar Registro',
                ],
                [
                    'titulo'                => 'Atualizar Registro',
                ],
                [
                    'titulo'                => 'Remover Registro',
                ],
                [
                    'titulo'                => 'Exceção do Sistema',
                ],
                
            ]);
            
        }
    }
}
