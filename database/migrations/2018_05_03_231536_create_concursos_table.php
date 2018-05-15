<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConcursosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_dedicacion')->unsigned();
            $table->string('referenciaGeneral');
            $table->string('referenciaInstituto');
            $table->integer('cargos');
            $table->string('lineaDesarrollo');
            $table->string('requisitos');
            $table->string('expediente');
            $table->string('fechaSustanciacion');
            $table->string('usuarioSustanciacion');
            $table->string('usuarioCierre');
            $table->string('observaciones');
            $table->string('fechaInicio');
            $table->string('fechaFin');
            $table->string('fechaConcurso');
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->foreign('id_dedicacion')->references('id')->on('dedicaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concursos');
    }
}
