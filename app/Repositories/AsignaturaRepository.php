<?php

namespace App\Repositories;

use App\Models\Asignatura;
use InfyOm\Generator\Common\BaseRepository;

class AsignaturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'id_area'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asignatura::class;
    }
}
