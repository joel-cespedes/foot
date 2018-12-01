<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDpedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpedidos', function (Blueprint $table) {
            $table->increments('id')->nullable();;
            $table->text('nombre')->nullable();;
            $table->integer('cantidad')->nullable();;
            $table->text('codigo')->nullable();;
            $table->text('precio')->nullable();;
            $table->text('precio_unidad')->nullable();;
            $table->text('modelo')->nullable();;
            $table->integer('orden')->default(1);
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dpedidos');
    }
}
