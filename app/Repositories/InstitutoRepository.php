<?php

namespace App\Repositories;

use App\Models\Instituto;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InstitutoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:26 am UTC
 *
 * @method Instituto findWithoutFail($id, $columns = ['*'])
 * @method Instituto find($id, $columns = ['*'])
 * @method Instituto first($columns = ['*'])
*/
class InstitutoRepository extends BaseRepository
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
        return Instituto::class;
    }
}
