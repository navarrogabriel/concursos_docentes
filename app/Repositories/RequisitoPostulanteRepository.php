<?php

namespace App\Repositories;

use App\Models\RequisitoPostulante;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequisitoPostulanteRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:29 am UTC
 *
 * @method RequisitoPostulante findWithoutFail($id, $columns = ['*'])
 * @method RequisitoPostulante find($id, $columns = ['*'])
 * @method RequisitoPostulante first($columns = ['*'])
*/
class RequisitoPostulanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'postulante_id',
        'requisitoEstado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequisitoPostulante::class;
    }
}
