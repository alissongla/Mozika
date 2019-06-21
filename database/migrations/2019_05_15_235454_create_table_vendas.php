<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('VEN_ID');
            $table->double('VEN_VALOR');
            $table->date('VEN_DATA_VENDA');
            $table->time('VEN_HORA_VENDA');
            $table->integer('VEN_QTDE_VENDIDA');
            $table->unsignedBigInteger('PRO_ID');
            $table->unsignedBigInteger('CLI_ID');
            $table->unsignedBigInteger('USU_ID');

            //Criando as chaves estrangeiras
            $table->foreign('PRO_ID')
                  ->references('PRO_ID')
                  ->on('produtos');

            $table->foreign('CLI_ID')
                  ->references('CLI_ID')
                  ->on('clientes');
            
            $table->foreign('USU_ID')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_vendas');
    }
}
