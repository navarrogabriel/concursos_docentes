<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurado extends Model
{
    use SoftDeletes;

    public $table = 'jurados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'categoria_id',
        'nombres',
        'apellidos',
        'documento',
        'telefono',
        'celular',
        'email',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria_id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'documento' => 'string',
        'telefono' => 'string',
        'celular' => 'string',
        'email' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'categoria_id' => 'required',
      'nombres' => 'required',
      'apellidos' => 'required',
      'documento' => 'required',
      'email' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function concursos()
    {
        return $this->belongsToMany(\App\Models\Concurso::class, 'concursosjurados');
    }
}
