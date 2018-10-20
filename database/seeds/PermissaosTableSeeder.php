<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissaos')->delete();
        
        DB::table('permissaos')->insert(
            array(
                0 => array(
                    'id' => '1',
                    'titulo' => 'User[Criar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000001',
					'url_action' => 'users.create',
					'url_model' => 'users',
					'descricao' => 'Realiza a exibição do formulário de cadastro de usuário.'
                ),
                1 => array(
                    'id' => '2',
                    'titulo' => 'User[Adicionar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000010',
					'url_action' => 'users.create',
					'url_model' => 'users',
					'descricao' => 'Salva o usuário.'
                ),
                2 => array(
                    'id' => '3',
                    'titulo' => 'User[Excluir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000011',
					'url_action' => 'users.delete',
					'url_model' => 'users',
					'descricao' => 'Exclui o usuário.'
                ),
                3 => array(
                    'id' => '4',
                    'titulo' => 'User[Editar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000100',
					'url_action' => 'users.edit',
					'url_model' => 'users',
					'descricao' => 'Realiza a exibição do formulário de edição.'
                ),
                4 => array(
                    'id' => '5',
                    'titulo' => 'User[Atualizar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000101',
					'url_action' => 'users.update',
					'url_model' => 'users',
					'descricao' => 'Atualiza os dados do usuário.'
                ),
                5 => array(
                    'id' => '6',
                    'titulo' => 'User[Listar]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000110',
					'url_action' => 'users.index',
					'url_model' => 'users',
					'descricao' => 'Lista todos os usuário.'
                ),
                6 => array(
                    'id' => '7',
                    'titulo' => 'User[Exibir]',
                    'acesso_privado' => 'FALSE',
                    'codigo_permissao' => '0000000111',
					'url_action' => 'users.show',
					'url_model' => 'users',
					'descricao' => 'Exibe os dados do usuário.'
                )
            ));
    }
}
