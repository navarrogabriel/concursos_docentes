<?php

namespace App\Repositories;

use App\Models\Concursospostulantes;
use InfyOm\Generator\Common\BaseRepository;

class ConcursospostulantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_concurso',
        'id_postulante',
        'cumpleRequisitos',
        'fechaPresentacion',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return concursospostulantes::class;
    }
}
