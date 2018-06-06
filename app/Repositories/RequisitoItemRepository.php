<?php

namespace App\Repositories;

use App\Models\RequisitoItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RequisitoItemRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:28 am UTC
 *
 * @method RequisitoItem findWithoutFail($id, $columns = ['*'])
 * @method RequisitoItem find($id, $columns = ['*'])
 * @method RequisitoItem first($columns = ['*'])
*/
class RequisitoItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'requisito_id',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RequisitoItem::class;
    }
}
