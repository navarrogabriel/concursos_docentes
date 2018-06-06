<?php

namespace App\Repositories;

use App\Models\Perfiles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PerfilesRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:28 am UTC
 *
 * @method Perfiles findWithoutFail($id, $columns = ['*'])
 * @method Perfiles find($id, $columns = ['*'])
 * @method Perfiles first($columns = ['*'])
*/
class PerfilesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Perfiles::class;
    }
}
