<?php

namespace App\Repositories;

use App\Models\Log;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:27 am UTC
 *
 * @method Log findWithoutFail($id, $columns = ['*'])
 * @method Log find($id, $columns = ['*'])
 * @method Log first($columns = ['*'])
*/
class LogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'operacion',
        'fecha',
        'tabla',
        'item_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Log::class;
    }
}
