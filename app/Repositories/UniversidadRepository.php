<?php

namespace App\Repositories;

use App\Models\Universidad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UniversidadRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:29 am UTC
 *
 * @method Universidad findWithoutFail($id, $columns = ['*'])
 * @method Universidad find($id, $columns = ['*'])
 * @method Universidad first($columns = ['*'])
*/
class UniversidadRepository extends BaseRepository
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
        return Universidad::class;
    }
}
