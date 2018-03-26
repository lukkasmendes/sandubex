<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->dateTime('dataSaida');
            $table->decimal('precoCusto', 9, 2);
            $table->decimal('subtotal', 9, 2);
            $table->string('observacao', 100)->nullable();
            $table->string('formaPagamento', 20);
            $table->integer('produto_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table){
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
        Schema::dropIfExists('pedidos');
    }
}
