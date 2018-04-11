<?php

use Illuminate\Database\Seeder;
use App\Responsavel;

class ResponsavelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Responsavel::count() == 0) {
            Responsavel::create([
                'telefone'              => '(61) 91888-7403',
                'cpf'                   => '99247542391',
                'user_id'               => 2
            ]);
        }
    }
}
