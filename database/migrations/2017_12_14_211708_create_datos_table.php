<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('texto_contacto')->nullable();
            $table->longText('condiciones_compra')->nullable();
            $table->longText('ublicacion')->nullable();
            $table->longText('email')->nullable();
            $table->longText('telefono')->nullable();
            $table->longText('mapa')->nullable();
            $table->longText('analitycs')->nullable();
            $table->integer('visitas')->nullable();
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
        Schema::dropIfExists('datos');
    }
}
