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
            $table->bigInteger('candidato_id')->unsigned();
            $table->text('funcoes_do_candidato')->nullable();
            $table->string('infracao')->nullable();
            $table->string('merece_portunidade')->nullable();
            $table->text('versao_motorista')->nullable();
            $table->timestamps();

            $table->foreign('candidato_id')
                    ->references('id')->on('candidatos')
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
