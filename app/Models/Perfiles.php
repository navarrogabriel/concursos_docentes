<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class perfiles
 * @package App\Models
 * @version May 3, 2018, 9:59 pm UTC
 */
class perfiles extends Model
{
    use SoftDeletes;

    public $table = 'perfiles';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
    public function concurso()
    {
      return $this->hasMany('App\Models\Concursos' , 'id');
    }


}
