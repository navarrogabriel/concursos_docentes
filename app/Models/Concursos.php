<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Concursos
 * @package App\Models
 * @version May 3, 2018, 11:15 pm UTC
 */
class Concursos extends Model
{
    use SoftDeletes;

    public $table = 'concursos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_asignatura',
        'id_categoria',
        'id_perfil',
        'id_dedicacion',
        'referenciaGeneral',
        'referenciaInstituto',
        'cargos',
        'lineaDesarrollo',
        'requisitos',
        'expediente',
        'fechaSustanciacion',
        'usuarioSustanciacion',
        'usuarioCierre',
        'observaciones',
        'fechaInicio',
        'fechaFin',
        'fechaConcurso',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_asignatura' => 'integer',
        'id_categoria' => 'integer',
        'id_perfil' => 'integer',
        'id_dedicacion' => 'integer',
        'referenciaGeneral' => 'string',
        'referenciaInstituto' => 'string',
        'cargos' => 'integer',
        'lineaDesarrollo' => 'string',
        'expediente' => 'string',
        'fechaSustanciacion' => 'string',
        'usuarioSustanciacion' => 'string',
        'usuarioCierre' => 'string',
        'fechaInicio' => 'string',
        'fechaFin' => 'string',
        'fechaConcurso' => 'string',
        'estado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expediente' => 'required',

    ];

    public function asignatura ()
    {
      return $this->belongsTo('App\Models\Asignatura', 'id_asignatura');

    }
    public function categoria ()
    {
      return $this->belongsTo('App\Models\Categorias', 'id_categoria');

    }
    public function perfil ()
    {
      return $this->belongsTo('App\Models\perfiles', 'id_perfil');

    }
    public function dedicacion ()
    {
      return $this->belongsTo('App\Models\Dedicaciones', 'id_dedicacion');

    }

    public function concursospostulantes()
    {
    return $this->hasMany('App\Models\Concursospostulantes' , 'id');

    }
    public function concursosjurados()
    {
    return $this->hasMany('App\Models\Concursosjurados' , 'id');

    }

    public function ordenesmeritos()
    {
    return $this->hasMany('App\Models\Ordenesmeritos' , 'id');

    }


}
