<?php

namespace App\Repositories;

use App\Models\Llamado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LlamadoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:27 am UTC
 *
 * @method Llamado findWithoutFail($id, $columns = ['*'])
 * @method Llamado find($id, $columns = ['*'])
 * @method Llamado first($columns = ['*'])
*/
class LlamadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'año',
        'fechaInicio',
        'fechaFin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Llamado::class;
    }
}
