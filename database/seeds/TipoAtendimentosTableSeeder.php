<?php

use Illuminate\Database\Seeder;
use App\Tipoatendimento;

class TipoAtendimentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoAtendimentos = Tipoatendimento::get();

        foreach ($tipoAtendimentos as $tipoAtendimento) {
            switch ($tipoAtendimento->id) {
                case 1:
                    $tipoAtendimento->tag_value = 'saude';
                    $tipoAtendimento->save();
                    break;
                
                case 2:
                    $tipoAtendimento->tag_value = 'odonto';
                    $tipoAtendimento->save();
                    break;
                
                case 3:
                    $tipoAtendimento->tag_value = 'exame';
                    $tipoAtendimento->save();
                    break;
                
                case 4:
                    $tipoAtendimento->tag_value = 'exame';
                    $tipoAtendimento->save();
                    break;
                
                default:
                    break;
            }
        }

    }
}