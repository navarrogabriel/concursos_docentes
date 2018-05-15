<?php

namespace App\Repositories;

use App\Models\Jurados;
use InfyOm\Generator\Common\BaseRepository;

class JuradosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'documento',
        'telefono',
        'celular',
        'email',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return jurados::class;
    }
}
