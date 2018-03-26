<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemmenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itemmenus')->delete();
        
        DB::table('itemmenus')->insert(array (
            0 =>
            array (
                'titulo'        => 'Cargos',
                //'descricao'     => 'Lista os cargos',
                'url'           => 'cargos',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'menu_id'       => 1,
            ),
            1 =>
            array (
                'titulo'        => 'Menus',
                //'descricao'     => 'Lista os menus do sistema',
                'url'           => 'menus',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'menu_id'       => 2,
            ),
            2 =>
            array (
                'titulo'        => 'Itens de Menu',
                //'descricao'     => 'Lista os itens de menu do sistema',
                'url'           => 'itemmenus',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'menu_id'       => 2,
            ),
            3 =>
            array (
                'titulo'        => 'Perfils de Usuário',
                //'descricao'     => 'Lista os menus do sistema',
                'url'           => 'perfilusers',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'menu_id'       => 2,
            ),
            4 =>
            array (
                'titulo'        => 'Permissões',
                //'descricao'     => 'Lista os itens de menu do sistema',
                'url'           => 'permissaos',
                'ic_item_class' => '',
                'ordemexibicao' => 4,
                'menu_id'       => 2,
            ),
            5 =>
            array (
                'titulo'        => 'Registro de Logs',
                //'descricao'     => 'Lista os logs de operação do sistema',
                'url'           => 'registro_logs',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'menu_id'       => 3,
            ),
            6 =>
            array (
                'titulo'        => 'Tipos de Logs',
                //'descricao'     => 'Lista os tipos de logs',
                'url'           => 'tipo_logs',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'menu_id'       => 3,
            ),
            7 =>
            array (
                'titulo'        => 'Pacientes',
                //'descricao'     => 'Lista os tipos de logs',
                'url'           => 'usuarios',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'menu_id'       => 1,
            ),
            8 =>
            array (
                'titulo'        => 'Clínicas',
                'url'           => 'prestadores',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'menu_id'       => 1,
            ),
            9 =>
            array (
                'titulo'        => 'Agenda',
                'url'           => 'agenda',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'menu_id'       => 1,
            )
        ));
    }
}
