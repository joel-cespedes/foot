<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cproductos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('m_title')->nullable();
            $table->longText('m_description')->nullable();
            $table->longText('m_key')->nullable();
            $table->longText('canonical')->nullable();
            $table->text('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('orden')->default(1)->nullable();
            $table->text('slug')->nullable();
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
        Schema::dropIfExists('cproductos');
    }
}
