<?php

use Illuminate\Database\Seeder;
use App\Perfiluser;

class PerfilusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Perfiluser::count() == 0) {
            Perfiluser::create([
                'titulo'                => 'Administrador',
                'descricao'             => 'Possui todas as permissões do sistema.',
                'tipo_permissao'        => 1
            ]);
        }
    }
}
