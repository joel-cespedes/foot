<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliticaPrivacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('politica_privacidads', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('m_title')->nullable();
            $table->longText('m_description')->nullable();
            $table->longText('m_key')->nullable();
            $table->longText('canonical')->nullable();
            $table->longText('nombre')->nullable();
            $table->longText('cuerpo')->nullable();
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
        Schema::dropIfExists('politica_privacidads');
    }
}
