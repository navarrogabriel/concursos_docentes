<?php

namespace App\Repositories;

use App\Models\CargoConcursado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CargoConcursadoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:24 am UTC
 *
 * @method CargoConcursado findWithoutFail($id, $columns = ['*'])
 * @method CargoConcursado find($id, $columns = ['*'])
 * @method CargoConcursado first($columns = ['*'])
*/
class CargoConcursadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'registro_id',
        'universidad_id',
        'categoria_id',
        'dedicacion',
        'registroTipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CargoConcursado::class;
    }
}
