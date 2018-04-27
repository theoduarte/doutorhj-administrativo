<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItempedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itempedidos')->delete();
        
        DB::table('pedidos')->insert(array (
            0 =>
            array (
                'id'    => '1',
                'titulo'    => 'Pedido Teste',
                'descricao'    => 'Pedido Teste',
                'dt_pagamento'    => '2018-04-23',
                'tp_pagamento'    => '',
            ),
        ));
        
        DB::table('itempedidos')->insert(array (
            0 =>
            array (
                'id'    => '1',
                'valor' => 320,
                'pedido_id' => 1,
                'agendamento_id' => 1,
            ),
        ));
        
        DB::table('itempedidos')->insert(array (
            0 =>
            array (
                'id'    => '2',
                'valor' => 100,
                'pedido_id' => 1,
                'agendamento_id' => 3,
            ),
        ));
        
        DB::table('itempedidos')->insert(array (
            0 =>
            array (
                'id'    => '3',
                'valor' => 90,
                'pedido_id' => 1,
                'agendamento_id' => 5,
            ),
        ));
    }
}