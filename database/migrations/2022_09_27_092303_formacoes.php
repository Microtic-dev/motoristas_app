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
      Schema::create('formacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('candidato_id')->unsigned();
            $table->string('nivel_de_ensino');
            $table->string('grau_de_ensino');
            $table->string('instituicao');
            $table->string('curso');
            $table->string('situacao');
            $table->date('inicio');
            $table->date('fim');
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
