<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateconcursospostulantesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursospostulantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_concurso')->unsigned();
            $table->integer('id_postulante')->unsigned();
            $table->string('cumpleRequisitos');
            $table->string('fechaPresentacion');
            $table->string('tipo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_concurso')->references('id')->on('concursos');
            $table->foreign('id_postulante')->references('id')->on('postulantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concursospostulantes');
    }
}
