<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('anuncios_provincias', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('anuncio_id')->unsigned();
        $table->bigInteger('provincia_id')->unsigned();
        $table->timestamps();

      $table->foreign('anuncio_id')
                ->references('id')->on('anuncios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

      $table->foreign('provincia_id')
                ->references('id')->on('provincias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

    

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
