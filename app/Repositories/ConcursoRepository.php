<?php

namespace App\Repositories;

use App\Models\Concurso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConcursoRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:25 am UTC
 *
 * @method Concurso findWithoutFail($id, $columns = ['*'])
 * @method Concurso find($id, $columns = ['*'])
 * @method Concurso first($columns = ['*'])
*/
class ConcursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'asignatura_id',
        'perfil_id',
        'categoria_id',
        'referenciaGeneral',
        'referenciaInstituto',
        'cargos',
        'lineaDesarrollo',
        'requisitos',
        'expediente',
        'fechaSustanciacion',
        'usuarioSustanciacion',
        'usuarioCierre',
        'observaciones',
        'fechaInicio',
        'fechaFin',
        'estado',
        'dedicacion',
        'dictamen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Concurso::class;
    }
}
