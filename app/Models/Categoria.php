<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categoria extends Model
{
    use SoftDeletes;

    public $table = 'categorias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'nivel'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nivel' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'nombre' => 'required',
      'nivel' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function universidades()
    {
        return $this->belongsToMany(\App\Models\Universidade::class, 'cargosconcursados');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function concursos()
    {
        return $this->hasMany(\App\Models\Concurso::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function jurados()
    {
        return $this->hasMany(\App\Models\Jurado::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function requisitos()
    {
        return $this->hasMany(\App\Models\Requisito::class);
    }
}
