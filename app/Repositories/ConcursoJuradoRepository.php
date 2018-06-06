<?php

namespace App\Repositories;

use App\Models\ConcursoJurado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConcursoJuradoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:07 am UTC
 *
 * @method ConcursoJurado findWithoutFail($id, $columns = ['*'])
 * @method ConcursoJurado find($id, $columns = ['*'])
 * @method ConcursoJurado first($columns = ['*'])
*/
class ConcursoJuradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'jurado_id',
        'nivel',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConcursoJurado::class;
    }
}
