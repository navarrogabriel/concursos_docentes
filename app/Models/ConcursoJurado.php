<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConcursoJurado extends Model
{
    use SoftDeletes;

    public $table = 'concursosjurados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'concurso_id',
        'jurado_id',
        'categoria_id',
        'nivel',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'concurso_id' => 'integer',
        'jurado_id' => 'integer',
        'categoria_id' => 'integer',
        'nivel' => 'string',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'concurso_id' => 'required',
      'jurado_id' => 'required',
      'categoria_id' => 'required',
      'nivel' => 'required',
      'tipo' => 'required'
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
    public function jurado()
    {
        return $this->belongsTo(\App\Models\Jurado::class);
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }
}
