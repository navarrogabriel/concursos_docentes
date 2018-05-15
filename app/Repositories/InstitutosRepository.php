<?php

namespace App\Repositories;

use App\Models\Institutos;
use InfyOm\Generator\Common\BaseRepository;

class InstitutosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return institutos::class;
    }
}
