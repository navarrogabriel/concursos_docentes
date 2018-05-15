<?php

namespace App\Repositories;

use App\Models\Concursos;
use InfyOm\Generator\Common\BaseRepository;

class ConcursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_asignatura',
        'id_categoria',
        'id_perfil',
        'id_dedicacion',
        'referenciaGeneral',
        'referenciaInstituto',
        'cargos',
        'lineaDesarrollo',
        'requisitos',
        'expediente',
        'fechaSustanciacion',
        'usuarioSustanciacion',
        'usuarioCierre',
        'observaciones',
        'fechaInicio',
        'fechaFin',
        'fechaConcurso',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Concursos::class;
    }
}
