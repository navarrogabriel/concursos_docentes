<?php

namespace App\Repositories;

use App\Models\Concursosjurados;
use InfyOm\Generator\Common\BaseRepository;

class ConcursosJuradosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_concurso',
        'id_jurado',
        'tipoJurado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return concursosjurados::class;
    }
}
