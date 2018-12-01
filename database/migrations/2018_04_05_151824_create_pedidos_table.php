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
            $table->longText('nombre')->nullable();
            $table->longText('apellido')->nullable();
            $table->longText('ci')->nullable();
            $table->longText('telefono')->nullable();
            $table->longText('email')->nullable();
            $table->longText('mensaje_cliente')->nullable();
            $table->longText('adjunto')->nullable();
            $table->longText('direccion1')->nullable();;
            $table->longText('direccion2')->nullable();;
            $table->longText('referencia')->nullable();;
            $table->longText('img')->nullable();;
            $table->longText('rif')->nullable();;
            $table->longText('compra')->nullable();;
            $table->longText('total')->nullable();;
            $table->longText('fecha')->nullable();;
            $table->longText('banco_depositante')->nullable();;
            $table->longText('telf_depositante')->nullable();;
            $table->longText('ci_depositante')->nullable();;
            $table->longText('nombre_depositante')->nullable();;
            $table->longText('datos')->nullable();;
            $table->integer('estado')->default(0);
            $table->integer('orden')->default(1);
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
        Schema::dropIfExists('pedidos');
    }
}
