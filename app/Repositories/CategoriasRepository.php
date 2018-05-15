<?php

namespace App\Repositories;

use App\Models\Categorias;
use InfyOm\Generator\Common\BaseRepository;

class CategoriasRepository extends BaseRepository
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
        return Categorias::class;
    }
}
