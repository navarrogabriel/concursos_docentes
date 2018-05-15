<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateconcursosjuradosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursosjurados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_concurso')->unsigned();
            $table->integer('id_jurado')->unsigned();
            $table->string('tipoJurado');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_concurso')->references('id')->on('concursos');
            $table->foreign('id_jurado')->references('id')->on('jurados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concursosjurados');
    }
}
