<?php

namespace App\Repositories;

use App\Models\Carrera;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CarreraRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:25 am UTC
 *
 * @method Carrera findWithoutFail($id, $columns = ['*'])
 * @method Carrera find($id, $columns = ['*'])
 * @method Carrera first($columns = ['*'])
*/
class CarreraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'instituto_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Carrera::class;
    }
}
