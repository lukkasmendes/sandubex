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
            $table->integer('numeroMesa');
            $table->integer('quantidade');
            $table->decimal('subtotal', 5, 2);
            $table->integer('produto_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table){
            $table->foreign('produto_id')->references('id')->on('produtos');
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
