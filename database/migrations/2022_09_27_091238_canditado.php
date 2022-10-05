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
          $table->string('telefone_alt')->nullable();
          $table->string('endereco');
          $table->bigInteger('provincia_id')->unsigned();
          $table->string('sexo');
          $table->bigInteger('categoria_id')->unsigned();
          $table->string('numero_carta_conducao')->nullable();
          $table->string('validade_conducao')->nullable(); //sim, nao
          $table->string('inibicao_anterior')->nullable(); //sim, nao
          $table->text('inibicao_motivo')->nullable(); // motivo de inibicao
          $table->string('envolvimento_acidente')->nullable(); //sim, nao, Já se envolveu em acidente de
          $table->text('acidente_descricao')->nullable(); //descricao do acidente
          $table->string('grau_academico')->nullable();
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

          $table->foreign('categoria_id')
                  ->references('id')->on('categorias')
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
          Schema::dropIfExists('candidatos');
    }
};
