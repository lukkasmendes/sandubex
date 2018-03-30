<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('dataEntrada');
            $table->integer('quantidade');
            $table->decimal('precoCusto', 9, 2);
            $table->integer('fornecedor_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('compras', function (Blueprint $table){
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
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
        Schema::dropIfExists('compras');
    }
}
