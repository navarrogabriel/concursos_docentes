<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class concursospostulantes
 * @package App\Models
 * @version May 13, 2018, 1:19 am UTC
 */
class concursospostulantes extends Model
{
    use SoftDeletes;

    public $table = 'concursospostulantes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_concurso',
        'id_postulante',
        'cumpleRequisitos',
        'fechaPresentacion',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_concurso' => 'integer',
        'id_postulante' => 'integer',
        'cumpleRequisitos' => 'string',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

      'id_concurso' => 'required',
      'id_postulante' => 'required',
      'cumpleRequisitos' => 'required',
      'tipo' => 'required',

    ];

    public function concurso ()

    {

    return $this->belongsTo('App\Models\Concursos' , 'id_concurso');

    }

    public function postulante ()

    {

    return $this->belongsTo('App\Models\Postulante' , 'id_postulante');

    }




}
