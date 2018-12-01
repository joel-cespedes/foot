<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('m_title')->nullable();
            $table->longText('m_description')->nullable();
            $table->longText('m_key')->nullable();
            $table->longText('canonical')->nullable();
            $table->longText('nombre')->nullable();;
            $table->longText('cuerpo')->nullable();
            $table->longText('img')->nullable();
            $table->longText('nimg')->nullable();
            $table->longText('slug')->nullable();
            $table->integer('visitas')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('estado')->default(1)->nullable();
            $table->integer('orden')->default(1)->nullable();
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
        Schema::dropIfExists('noticias');
    }
}
