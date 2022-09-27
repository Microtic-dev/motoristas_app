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
      Schema::create('idiomas', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger('candidato_id')->unsigned();
         $table->string('idioma');
         $table->string('nivel');
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
