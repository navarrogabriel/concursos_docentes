<?php

namespace App\Repositories;

use App\Models\Postulante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PostulanteRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:28 am UTC
 *
 * @method Postulante findWithoutFail($id, $columns = ['*'])
 * @method Postulante find($id, $columns = ['*'])
 * @method Postulante first($columns = ['*'])
*/
class PostulanteRepository extends BaseRepository
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
        return Postulante::class;
    }
}
