<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('m_title')->nullable();
            $table->longText('m_description')->nullable();
            $table->longText('m_key')->nullable();
            $table->longText('canonical')->nullable();
            $table->longText('nombre')->nullable();
            $table->longText('slogan')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('img')->nullable();
            $table->longText('nimg')->nullable();
            $table->longText('promo')->nullable();
            $table->longText('informa_nutri')->nullable();
            $table->longText('palabras')->nullable();
            $table->integer('estado')->default(1)->nullable();
            $table->integer('precio')->nullable();
            $table->longText('texto_compras')->nullable();
            $table->longText('beneficios')->nullable();
            $table->integer('precio_falso')->default(280)->nullable();
            $table->integer('visitas')->nullable();
            $table->integer('oferta')->default(0)->nullable();
            $table->integer('cproducto_id')->nullable();
            $table->integer('cantidad_pastillas')->default(60)->nullable();
            $table->integer('peso')->default(250)->nullable();
            $table->integer('orden')->default(1)->nullable();
            $table->longText('url')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
