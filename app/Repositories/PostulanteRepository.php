<?php

namespace App\Repositories;

use App\Models\Postulante;
use InfyOm\Generator\Common\BaseRepository;

class PostulanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellido',
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
        return Postulante::class;
    }
}
