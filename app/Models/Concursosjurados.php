<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class concursosjurados
 * @package App\Models
 * @version May 13, 2018, 9:30 pm UTC
 */
class concursosjurados extends Model
{
    use SoftDeletes;

    public $table = 'concursosjurados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_concurso',
        'id_jurado',
        'tipoJurado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_concurso' => 'integer',
        'id_jurado' => 'integer',
        'tipoJurado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function concurso ()

    {

    return $this->belongsTo('App\Models\Concursos' , 'id_concurso');

    }

    public function jurado ()

    {

    return $this->belongsTo('App\Models\Jurados' , 'id_jurado');

    }

}
