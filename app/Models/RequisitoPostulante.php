<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequisitoPostulante extends Model
{
    use SoftDeletes;

    public $table = 'requisitospostulantes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'postulante_id',
        'requisitoEstado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'requisitoitem_id' => 'integer',
        'postulante_id' => 'integer',
        'requisitoEstado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'requisitoitem_id' => 'required',
      'postulante_id' => 'required',
      'requisitoEstado' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function postulante()
    {
        return $this->belongsTo(\App\Models\Postulante::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function requisitositem()
    {
        return $this->belongsTo(\App\Models\Requisitositem::class);
    }
}
