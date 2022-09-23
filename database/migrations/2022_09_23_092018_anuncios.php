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
      Schema::create('anuncios', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('user_id')->unsigned();
        $table->string('titulo');
        $table->date('validade');
        $table->text('descricao');
        $table->string('estado_anuncio');
        $table->string('forma_de_candidatura');
        $table->string('tipo_de_anuncio');
        $table->bigInteger('categoria_id')->unsigned();
        $table->timestamps();

      $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

      $table->foreign('user_id')
                ->references('id')->on('users')
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
