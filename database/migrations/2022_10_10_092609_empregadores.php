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
      Schema::create('empregadors', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->bigInteger('user_id')->unsigned();
           $table->string('telefone');
           $table->string('telefone_alt')->nullable();
           $table->string('website')->nullable();
           $table->string('endereco');
           $table->string('sector_actividade');
           $table->string('sector_especificado')->nullable();
           $table->bigInteger('provincia_id')->unsigned();
           $table->text('sobre')->nullable();
           $table->text('empresa');
           $table->string('representante')->nullable();
           $table->string('estado')->nullable(); //activo ou desativo
           $table->string('documento_nuit')->nullable();
           $table->string('documento_certidao')->nullable();
           $table->string('documento_inicio_actividade')->nullable();
           $table->timestamps();

           $table->foreign('provincia_id')
                   ->references('id')->on('provincias')
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
