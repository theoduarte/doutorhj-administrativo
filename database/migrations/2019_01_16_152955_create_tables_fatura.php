<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesFatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('faturas', function(Blueprint $table)
		{
			$table->integer('id', true);

			$table->integer('paciente_id')->nullable();
			$table->integer('pedido_id')->nullable();
			$table->integer('profissional_id')->nullable();
			$table->integer('status_fatura_id');
			$table->integer('meio_pagamento_id')->nullable();
			$table->integer('status_pagamento_id')->nullable();
			$table->integer('tipo_pagamento_id')->nullable();
			$table->integer('banco_id')->nullable();
			$table->date('data');
			$table->string('agencia', 45)->nullable();
			$table->string('conta_corrente', 45)->nullable();
			$table->boolean('sem_cobranca')->default(false);
			$table->decimal('valor_total_bruto');
			$table->decimal('desconto_nota');
			$table->decimal('desconto_total');
			$table->decimal('valor_total_liquido');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->integer('created_by');
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
			$table->integer('updated_by');
		});

		Schema::create('fatura_items', function(Blueprint $table)
		{
			$table->integer('id', true);

			$table->



			$table->integer('paciente_id')->nullable();
			$table->integer('pedido_id')->nullable();
			$table->integer('profissional_id')->nullable();
			$table->integer('status_fatura_id');
			$table->integer('meio_pagamento_id')->nullable();
			$table->integer('status_pagamento_id')->nullable();
			$table->integer('tipo_pagamento_id')->nullable();
			$table->integer('banco_id')->nullable();
			$table->date('data');
			$table->string('agencia', 45)->nullable();
			$table->string('conta_corrente', 45)->nullable();
			$table->boolean('sem_cobranca')->default(false);
			$table->decimal('valor_total_bruto');
			$table->decimal('desconto_nota');
			$table->decimal('desconto_total');
			$table->decimal('valor_total_liquido');

			$table->timestamp('created_at', 0)->useCurrent()->nullable();
			$table->integer('created_by');
			$table->timestamp('updated_at', 0)->useCurrent()->nullable();
			$table->integer('updated_by');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
