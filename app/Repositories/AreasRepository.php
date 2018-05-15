<?php

namespace App\Repositories;

use App\Models\Areas;
use InfyOm\Generator\Common\BaseRepository;

class AreasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'instituto_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Areas::class;
    }
}
