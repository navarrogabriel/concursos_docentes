<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Postulante
 * @package App\Models
 * @version May 2, 2018, 9:57 pm UTC
 */
class Postulante extends Model
{
    use SoftDeletes;

    public $table = 'postulantes';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombres',
        'apellido',
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
        'apellido' => 'string',
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

    ];
    public function concursospostulantes()
    {
    return $this->hasMany('App\Models\Concursospostulantes' , 'id');

    }
    public function ordenesmeritos()
    {
    return $this->hasMany('App\Models\Ordenesmeritos' , 'id');

    }


}
