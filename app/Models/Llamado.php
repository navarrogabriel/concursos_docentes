<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Llamado extends Model
{
    use SoftDeletes;

    public $table = 'llamados';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo',
        'año',
        'fechaInicio',
        'fechaFin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'año' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'codigo' => 'required',
      'año' => 'required',
      'fechaInicio'=> 'required',
      'fechaFin' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function concursos()
    {
        return $this->belongsToMany(\App\Models\Concurso::class, 'llamadosconcursos');
    }
}
