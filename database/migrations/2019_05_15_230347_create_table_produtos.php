<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('PRO_ID');
            $table->string('PRO_NOME');
            $table->double('PRO_VALOR', 8, 2);
            $table->integer('PRO_QTDE_ESTOQUE');
            $table->unsignedBigInteger('FOR_ID');
            $table->unsignedBigInteger('CAT_ID');
            $table->timestamps();

            //Criando as chaves estrangeiras
            $table->foreign('FOR_ID')
                  ->references('FOR_ID')
                  ->on('fornecedores');
                  
            $table->foreign('CAT_ID')
                  ->references('CAT_ID')
                  ->on('categorias');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_produtos');
    }
}
