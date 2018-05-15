<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ordenesmerito
 * @package App\Models
 * @version May 14, 2018, 1:29 am UTC
 */
class ordenesmerito extends Model
{
    use SoftDeletes;

    public $table = 'ordenesmeritos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_concurso',
        'id_postulante',
        'orden'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_concurso' => 'integer',
        'id_postulante' => 'integer',
        'orden'=>'integer'
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

    public function postulante ()

    {

    return $this->belongsTo('App\Models\Postulante' , 'id_postulante');

    }



}
