<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Areas
 * @package App\Models
 * @version May 3, 2018, 1:21 am UTC
 */
class Areas extends Model
{
    use SoftDeletes;

    public $table = 'areas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'descripcion',
        'instituto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
        'instituto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function instituto ()
    {
      return $this->belongsTo('App\Models\Institutos' , 'instituto_id');
    }

    public function asignaturas()
    {
      return $this->hasMany('App\Models\Asignatura' , 'id');
    }
}
