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


        Schema::create('central_de_riscos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empregador_id')->unsigned();


            $table->string('nome_motorista');
            $table->date('datanascismento_motorista')->nullable();
            $table->integer('celular_motorista')->nullable();
            $table->string('endereco_motorista')->nullable();
            $table->string('provincia_motorista')->nullable();
            $table->string('Categoria_motorista')->nullable();
            $table->string('cartadeconducao_motorista')->nullable();
            $table->string('nacionalidade_motorista')->nullable();


            $table->string('funcoes_do_candidato')->nullable();
            $table->text('infracao')->nullable();
            $table->string('merece_portunidade')->nullable();
            $table->text('versao_motorista')->nullable();
            $table->string('estado_denuncia')->nullable();
            $table->timestamps();



            $table->foreign('empregador_id')
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
