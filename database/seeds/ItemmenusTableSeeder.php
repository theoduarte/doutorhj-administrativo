<?php

use Illuminate\Database\Seeder;

class ItemmenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('itemmenus')->delete();
        
        \DB::table('itemmenus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'Cargos',
                'url' => 'cargos',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => 'Menus',
                'url' => 'menus',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => 'Itens de Menu',
                'url' => 'itemmenus',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'titulo' => 'Perfils de Usuário',
                'url' => 'perfilusers',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'titulo' => 'Permissões',
                'url' => 'permissaos',
                'ic_item_class' => '',
                'ordemexibicao' => 4,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'titulo' => 'Registro de Logs',
                'url' => 'registro_logs',
                'ic_item_class' => '',
                'ordemexibicao' => 1,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'titulo' => 'Tipos de Logs',
                'url' => 'tipo_logs',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'titulo' => 'Clientes',
                'url' => 'clientes',
                'ic_item_class' => '',
                'ordemexibicao' => 2,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'titulo' => 'Clínicas',
                'url' => 'clinicas',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'titulo' => 'Agenda',
                'url' => 'agenda',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'titulo' => 'Profissionais',
                'url' => 'profissionals',
                'ic_item_class' => '',
                'ordemexibicao' => 3,
                'created_at' => '2018-04-16 15:44:01',
                'updated_at' => '2018-04-16 15:44:01',
                'menu_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'titulo' => 'Cupons de Desconto',
                'url' => 'cupom_descontos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 3,
                'created_at' => '2018-05-12 19:11:08',
                'updated_at' => '2018-05-12 19:11:08',
                'menu_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'titulo' => 'Consultas',
                'url' => 'consultas',
                'ic_item_class' => NULL,
                'ordemexibicao' => 1,
                'created_at' => '2018-06-15 17:47:44',
                'updated_at' => '2018-06-15 17:47:44',
                'menu_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'titulo' => 'Grupos de Procedt.',
                'url' => 'grupo_procedimentos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 2,
                'created_at' => '2018-06-15 17:47:59',
                'updated_at' => '2018-06-15 17:47:59',
                'menu_id' => 4,
            ),
            14 => 
            array (
                'id' => 15,
                'titulo' => 'Procedimentos',
                'url' => 'procedimentos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 3,
                'created_at' => '2018-06-15 17:49:04',
                'updated_at' => '2018-06-15 17:49:04',
                'menu_id' => 4,
            ),
            15 => 
            array (
                'id' => 16,
                'titulo' => 'Tipo de Atendt.',
                'url' => 'tipo_atendimentos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 4,
                'created_at' => '2018-06-15 17:49:18',
                'updated_at' => '2018-06-15 17:49:18',
                'menu_id' => 4,
            ),
            16 => 
            array (
                'id' => 17,
                'titulo' => 'Usuários',
                'url' => 'users',
                'ic_item_class' => NULL,
                'ordemexibicao' => 6,
                'created_at' => '2018-06-25 22:38:59',
                'updated_at' => '2018-06-25 22:38:59',
                'menu_id' => 2,
            ),
            17 => 
            array (
                'id' => 18,
                'titulo' => 'Checkups',
                'url' => 'checkups',
                'ic_item_class' => NULL,
                'ordemexibicao' => 20,
                'created_at' => '2018-07-18 18:32:34',
                'updated_at' => '2018-07-18 18:32:34',
                'menu_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'titulo' => 'Termos e Condições',
                'url' => 'termos-condicoes',
                'ic_item_class' => NULL,
                'ordemexibicao' => 90,
                'created_at' => '2018-07-25 16:53:27',
                'updated_at' => '2018-07-25 16:53:27',
                'menu_id' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'titulo' => 'Empresas',
                'url' => 'empresas',
                'ic_item_class' => NULL,
                'ordemexibicao' => 4,
                'created_at' => '2018-10-02 18:43:25',
                'updated_at' => '2018-10-02 18:43:25',
                'menu_id' => 1,
            ),
            20 => 
            array (
                'id' => 23,
                'titulo' => 'Entidades',
                'url' => 'entidades',
                'ic_item_class' => NULL,
                'ordemexibicao' => 5,
                'created_at' => '2018-10-02 18:45:02',
                'updated_at' => '2018-10-02 18:45:02',
                'menu_id' => 1,
            ),
            21 => 
            array (
                'id' => 21,
                'titulo' => 'Planos',
                'url' => 'planos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 6,
                'created_at' => '2018-10-02 18:44:27',
                'updated_at' => '2018-10-02 18:44:27',
                'menu_id' => 1,
            ),
            22 => 
            array (
                'id' => 24,
                'titulo' => 'Servições Adicionais',
                'url' => 'servico-adicionals',
                'ic_item_class' => NULL,
                'ordemexibicao' => 7,
                'created_at' => '2018-10-02 18:45:43',
                'updated_at' => '2018-10-02 18:45:43',
                'menu_id' => 1,
            ),
            23 => 
            array (
                'id' => 25,
                'titulo' => 'Áreas de Atuação',
                'url' => 'area_atuacaos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 5,
                'created_at' => '2018-11-03 10:28:35',
                'updated_at' => '2018-11-03 10:28:35',
                'menu_id' => 4,
            ),
            24 => 
            array (
                'id' => 26,
                'titulo' => 'Especialidades',
                'url' => 'especialidades',
                'ic_item_class' => NULL,
                'ordemexibicao' => 6,
                'created_at' => '2018-11-03 12:02:12',
                'updated_at' => '2018-11-03 12:02:12',
                'menu_id' => 4,
            ),
            25 => 
            array (
                'id' => 27,
                'titulo' => 'Reqt. de Titulação',
                'url' => 'requisitos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 7,
                'created_at' => '2018-11-03 12:29:58',
                'updated_at' => '2018-11-03 12:29:58',
                'menu_id' => 4,
            ),
            26 => 
            array (
                'id' => 28,
                'titulo' => 'Titulações',
                'url' => 'titulacaos',
                'ic_item_class' => NULL,
                'ordemexibicao' => 8,
                'created_at' => '2018-11-03 12:30:21',
                'updated_at' => '2018-11-03 12:30:21',
                'menu_id' => 4,
            ),
        ));
        
        
    }
}