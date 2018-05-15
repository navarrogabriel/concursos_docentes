<?php

namespace App\Repositories;

use App\Models\Dedicaciones;
use InfyOm\Generator\Common\BaseRepository;

class DedicacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return dedicaciones::class;
    }
}
