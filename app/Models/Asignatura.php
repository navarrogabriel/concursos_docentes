<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * Class Asignatura
 * @package App\Models
 * @version May 3, 2018, 3:45 am UTC
 */
class Asignatura extends Model
{
    use SoftDeletes;

    public $table = 'asignaturas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'id_area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'id_area' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function areas ()
    {
      return $this->belongsTo('App\Models\Areas', 'id_area');

    }


}
