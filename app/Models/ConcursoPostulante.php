<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConcursoPostulante extends Model
{
    use SoftDeletes;

    public $table = 'concursospostulantes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'concurso_id',
        'postulante_id',
        'fechaPresentacion',
        'tipo',
        'ordenMerito'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'concurso_id' => 'integer',
        'postulante_id' => 'integer',
        'tipo' => 'string',
        'ordenMerito' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'concurso_id' => 'required',
      'postulante_id' => 'required',
      'tipo' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function concurso()
    {
        return $this->belongsTo(\App\Models\Concurso::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function postulante()
    {
        return $this->belongsTo(\App\Models\Postulante::class);
    }
}
