<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concurso extends Model
{
    use SoftDeletes;

    public $table = 'concursos';


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [
      'deleted_at',
      'fechaSustanciacion',
      'fechaInicio',
      'fechaFin',
    ];


    public $fillable = [
        'asignatura_id',
        'perfil_id',
        'categoria_id',
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
        'estado',
        'dedicacion',
        'dictamen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'asignatura_id' => 'integer',
        'perfil_id' => 'integer',
        'categoria_id' => 'integer',
        'referenciaGeneral' => 'string',
        'referenciaInstituto' => 'string',
        'cargos' => 'boolean',
        'lineaDesarrollo' => 'string',
        'requisitos' => 'string',
        'expediente' => 'string',
        'usuarioSustanciacion' => 'integer',
        'usuarioCierre' => 'integer',
        'observaciones' => 'string',
        'estado' => 'string',
        'dedicacion' => 'string',
        'dictamen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'asignatura_id' => 'required',
      'perfil_id' => 'required',
      'categoria_id' => 'required',
      'cargos' => 'required',
      'fechaInicio' => 'required',
      'fechaFin' => 'required',
      'estado' => 'required',
      'dedicacion' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function asignatura()
    {
        return $this->belongsTo(\App\Models\Asignatura::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function perfile()
    {
        return $this->belongsTo(\App\Models\Perfiles::class , 'perfil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userSus()
    {
        return $this->belongsTo(\App\Models\User::class , 'usuarioSustanciacion');
    }

    public function userCie()
    {
        return $this->belongsTo(\App\Models\User::class , 'usuarioCierre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function jurados()
    {
        return $this->belongsToMany(\App\Models\Jurado::class, 'concursosjurados');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function postulantes()
    {
        return $this->belongsToMany(\App\Models\Postulante::class, 'concursospostulantes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function llamados()
    {
        return $this->belongsToMany(\App\Models\Llamado::class, 'llamadosconcursos');
    }
}
