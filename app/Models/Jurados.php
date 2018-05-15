<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class jurados
 * @package App\Models
 * @version May 3, 2018, 9:58 pm UTC
 */
class jurados extends Model
{
    use SoftDeletes;

    public $table = 'jurados';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'email' => 'email'
    ];

    public function concursosjurados()
    {
    return $this->hasMany('App\Models\Concursosjurados' , 'id');

    }
    
}
