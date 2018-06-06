<?php

namespace App\Repositories;

use App\Models\Area;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AreaRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:24 am UTC
 *
 * @method Area findWithoutFail($id, $columns = ['*'])
 * @method Area find($id, $columns = ['*'])
 * @method Area first($columns = ['*'])
*/
class AreaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'carrera_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Area::class;
    }
}
