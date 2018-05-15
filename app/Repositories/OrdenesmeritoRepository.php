<?php

namespace App\Repositories;

use App\Models\Ordenesmerito;
use InfyOm\Generator\Common\BaseRepository;

class OrdenesmeritoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_concurso',
        'id_postulante',
        'orden'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ordenesmerito::class;
    }
}
