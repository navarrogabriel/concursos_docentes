<?php

namespace App\Repositories;

use App\Models\perfiles;
use InfyOm\Generator\Common\BaseRepository;

class PerfilesRepository extends BaseRepository
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
        return perfiles::class;
    }
}
