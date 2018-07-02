<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoConcursado extends Model
{
    use SoftDeletes;

    public $table = 'cargosconcursados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'persona_id',
        'universidad_id',
        'categoria_id',
        'dedicacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'persona_id' => 'integer',
        'universidad_id' => 'integer',
        'categoria_id' => 'integer',
        'dedicacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'persona_id' => 'required',
      'universidad_id' => 'required',
      'categoria_id' => 'required',
      'dedicacion' => 'required'
    ];

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
    public function universidade()
    {
        return $this->belongsTo(\App\Models\Universidade::class);
    }

    public function persona()
    {
        //hay que buscar una forma de que devuelva jurados+postulantes ya que el modelo personas no existe
        return $this->belongsTo(\App\Models\Jurado::class);
    }
}
