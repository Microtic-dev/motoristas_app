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
      Schema::create('experiencias', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('candidato_id')->unsigned();
          $table->string('empresa');
          $table->string('cargo');
          $table->text('actividades_exercidas');
          $table->string('pais');
          $table->string('cidade');
          $table->date('inicio');
          $table->date('fim')->nullable();
          $table->string('trabalha_ate_agora');
          $table->string('tipo_de_contrato');
          $table->string('ultimo_salario')->nullable();
          $table->text('motivo_de_saida');
          $table->timestamps();

          $table->foreign('candidato_id')
                  ->references('id')->on('candidatos')
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
