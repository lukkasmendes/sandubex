<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('categoria_id')->unsigned();
            $table->string('unidade', 100);
            $table->decimal('precoCusto', 5, 2);
            $table->decimal('precoVenda', 5, 2);
            $table->dateTime('validade');
            $table->integer('estoqueMin');
            $table->integer('estoque');
            $table->string('descricao', 100);
            $table->binary('imagem');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table){
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
