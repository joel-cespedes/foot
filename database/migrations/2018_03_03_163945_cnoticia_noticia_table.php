<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CnoticiaNoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnoticia_noticia', function (Blueprint $table) {
            $table->integer('cnoticia_id')->unsigned();
            $table->integer('noticia_id')->unsigned();

            $table->foreign('cnoticia_id')->references('id')->on('cnoticias');
            $table->foreign('noticia_id')->references('id')->on('noticias');
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


        Schema::dropIfExists('cnoticia_noticia');

    }
}
