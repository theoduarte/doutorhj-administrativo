<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(MenusTableSeeder::class);
		$this->call(ItemmenusTableSeeder::class);
		$this->call(CargosTableSeeder::class);
		$this->call(PerfilusersTableSeeder::class);
	    $this->call(UsersTableSeeder::class);
		$this->call(EstadosTableSeeder::class);
		$this->call(CidadesTableSeeder::class);
		$this->call(EspecialidadesTableSeeder::class);
		$this->call(PacientesTableSeeder::class);
 		$this->call(ResponsavelsTableSeeder::class);
		$this->call(ProcedimentosTableSeeder::class);
		$this->call(ConsultasTableSeeder::class);
		$this->call(ClinicasTableSeeder::class);
		$this->call(ProfissionalsTableSeeder::class);
		$this->call(TipoAtendimentosTableSeeder::class);
		$this->call(AgendamentosTableSeeder::class);
		$this->call(ItempedidosTableSeeder::class);
		
        $this->call(TipoVouchersTableSeeder::class);
        $this->call(TipoPlanosTableSeeder::class);
        $this->call(TipoPrecosTableSeeder::class);
        $this->call(TipoCartaosTableSeeder::class);
        $this->call(TipoEmpresasTableSeeder::class);
    }
}
