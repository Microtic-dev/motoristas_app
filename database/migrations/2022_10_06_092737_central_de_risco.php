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
        campos tabela central de risco: id_motorita, id_empregador, infracao, merece_portunidade, status_denuncio, versao_motorista

        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empregador_id')->unsigned();
            $table->bigInteger('candidato_id')->unsigned();
            $table->string('funcoes_do_candidato')->nullable();
            $table->string('infracao')->nullable();
            $table->string('merece_portunidade')->nullable();
            $table->string('versao_motorista');

            $table->timestamps();

            $table->foreign('candidato_id')
                    ->references('id')->on('candidato')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('empregador_id')
                    ->references('id')->on('recrutadores')
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
