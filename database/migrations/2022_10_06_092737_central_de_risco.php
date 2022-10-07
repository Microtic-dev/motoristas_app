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
            $table->bigInteger('user_id')->unsigned();
            $table->string('funcoes_do_candidato')->nullable();
            $table->text('infracao')->nullable();
            $table->string('merece_portunidade')->nullable();
            $table->text('versao_motorista')->nullable();
            $table->string('estado_denuncia')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

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
