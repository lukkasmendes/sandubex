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
            $table->integer('estoque_id')->unsigned()->nullable();
            $table->decimal('precoVenda', 9, 2);
            $table->string('validade');
            $table->integer('estoqueMin');
            $table->string('descricao', 100);
            $table->binary('imagem');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table){
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
        Schema::table('produtos', function (Blueprint $table){
            $table->foreign('estoque_id')->references('id')->on('estoques');
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
