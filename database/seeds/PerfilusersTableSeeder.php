<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* if (Perfiluser::count() == 0) {
            Perfiluser::create([
                'titulo'                => 'Administrador',
                'descricao'             => 'Possui todas as permissões do sistema.',
                'tipo_permissao'        => 1
            ]);
        } */
        
        if(DB::table('perfilusers')->get()->count() == 0){
            
            DB::table('perfilusers')->insert([
                
                [
                    'titulo'                => 'Administrador',
                    'descricao'             => 'Possui todas as permissões do sistema.',
                    'tipo_permissao'        => 1
                ],
                [
                    'titulo'                => 'Responsável',
                    'descricao'             => 'Responsável Técnico pela Clínica.',
                    'tipo_permissao'        => 10
                ],
                [
                    'titulo'                => 'Paciente',
                    'descricao'             => 'Clientes usuários do sistema.',
                    'tipo_permissao'        => 4
                ],
                [
                    'titulo'                => 'Operador',
                    'descricao'             => 'Realiza cadastros e atualização de dados no sistema.',
                    'tipo_permissao'        => 5
                ]
                
            ]);
            
        }
    }
}
