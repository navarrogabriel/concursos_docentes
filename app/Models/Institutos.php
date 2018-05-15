<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class institutos
 * @package App\Models
 * @version May 3, 2018, 1:34 am UTC
 */
class institutos extends Model
{
    use SoftDeletes;

    public $table = 'institutos';


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

    public function areas ()
    {
       return $this->hasMany('App\Models\Areas' , 'id');
    }


}
