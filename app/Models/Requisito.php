<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisito extends Model
{
    use SoftDeletes;

    public $table = 'requisitos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'categoria_id',
        'perfil_id',
        'dedicacion',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoria_id' => 'integer',
        'perfil_id' => 'integer',
        'dedicacion' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'categoria_id' => 'required',
      'perfil_id' => 'required',
      'dedicacion' => 'required',
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
    public function perfile()
    {
        return $this->belongsTo(\App\Models\Perfile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requisitositems()
    {
        return $this->hasMany(\App\Models\Requisitositem::class);
    }
}
