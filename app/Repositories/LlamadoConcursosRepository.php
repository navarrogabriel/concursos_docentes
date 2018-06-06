<?php

namespace App\Repositories;

use App\Models\LlamadoConcursos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LlamadoConcursosRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:27 am UTC
 *
 * @method LlamadoConcursos findWithoutFail($id, $columns = ['*'])
 * @method LlamadoConcursos find($id, $columns = ['*'])
 * @method LlamadoConcursos first($columns = ['*'])
*/
class LlamadoConcursosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'concurso_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LlamadoConcursos::class;
    }
}
