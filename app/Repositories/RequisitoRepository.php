<?php

namespace App\Repositories;

use App\Models\Requisito;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequisitoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:28 am UTC
 *
 * @method Requisito findWithoutFail($id, $columns = ['*'])
 * @method Requisito find($id, $columns = ['*'])
 * @method Requisito first($columns = ['*'])
*/
class RequisitoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'categoria_id',
        'perfil_id',
        'dedicacion',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Requisito::class;
    }
}
