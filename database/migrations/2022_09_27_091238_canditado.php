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
      Schema::create('candidatos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('user_id')->unsigned();
          $table->date('datanascimento');
          $table->string('telefone')->unique();
          $table->string('telefone_alt')->nullable();
          $table->string('endereco');
          $table->bigInteger('provincia_id')->unsigned();
          $table->string('sexo');
          $table->string('perfil')->nullable();
          $table->string('ano_experiencia')->nullable();
          $table->string('grau_academico')->nullable();
          $table->text('resumo')->nullable();
          $table->string('nacionalidade')->nullable();
          $table->timestamps();

          $table->foreign('user_id')
                  ->references('id')->on('users')
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
          Schema::dropIfExists('candidatura_anuncio');
    }
};
