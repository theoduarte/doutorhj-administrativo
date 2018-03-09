<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 =>
            array (
                'titulo' => 'Cadastros',
                'descricao' => 'Agrupa os cadastros operacionais do sistema',
                'ic_menu_class' => 'ti-menu-alt'
            ),
            1 =>
            array (
                'titulo' => 'Configurações',
                'descricao' => 'Agrupa os cadastros de configuração do sistema',
                'ic_menu_class' => 'ti-settings'
            ),
            2 =>
            array (
                'titulo' => 'Auditoria',
                'descricao' => 'Agrupa as funcções de log do sistema',
                'ic_menu_class' => 'ti-search'
            ),
        ));
    }
}
