<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->enum('status', ['RE', 'PA', 'CA']);
            $table->decimal('valor', 6, 2)->default(0);
            $table->integer('cliente_id')->nullable()->unsigned();

            $table->string('observacao', 100)->nullable();
            $table->string('formaPagamento', 20)->nullable();

            $table->timestamps();
        });

        Schema::table('pedido_produtos', function (Blueprint $table){
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
}
