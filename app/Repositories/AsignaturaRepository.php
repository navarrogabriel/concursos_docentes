<?php

namespace App\Repositories;

use App\Models\Asignatura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsignaturaRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:24 am UTC
 *
 * @method Asignatura findWithoutFail($id, $columns = ['*'])
 * @method Asignatura find($id, $columns = ['*'])
 * @method Asignatura first($columns = ['*'])
*/
class AsignaturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'area_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asignatura::class;
    }
}
