<?php

namespace App\Repositories;

use App\Models\ConcursoPostulante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConcursoPostulanteRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:25 am UTC
 *
 * @method ConcursoPostulante findWithoutFail($id, $columns = ['*'])
 * @method ConcursoPostulante find($id, $columns = ['*'])
 * @method ConcursoPostulante first($columns = ['*'])
*/
class ConcursoPostulanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'postulante_id',
        'cumpleRequisitos',
        'fechaPresentacion',
        'tipo',
        'ordenMerito'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConcursoPostulante::class;
    }
}
