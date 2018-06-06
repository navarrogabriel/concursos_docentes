<?php

namespace App\Repositories;

use App\Models\Jurado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JuradoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:26 am UTC
 *
 * @method Jurado findWithoutFail($id, $columns = ['*'])
 * @method Jurado find($id, $columns = ['*'])
 * @method Jurado first($columns = ['*'])
*/
class JuradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_id',
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
        return Jurado::class;
    }
}
