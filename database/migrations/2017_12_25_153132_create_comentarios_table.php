<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('nombre')->nullable();
            $table->longText('comentario')->nullable();
            $table->longText('puntuacion')->nullable();
            $table->integer('estado')->default(0)->nullable();
            $table->integer('orden')->default(1)->nullable();
            $table->integer('producto_id')->nullable();;
            $table->integer('noticia_id')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
