<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LlamadoConcursos extends Model
{
    use SoftDeletes;

    public $table = 'llamadosconcursos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'llamado_id',
        'concurso_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'llamado_id' => 'integer',
        'concurso_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'llamado_id' => 'required',
      'concurso_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function concurso()
    {
        return $this->belongsTo(\App\Models\Concurso::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function llamado()
    {
        return $this->belongsTo(\App\Models\Llamado::class);
    }

    public function getCodigoAndAnio()
    {
    return $this->llamado->codigo . ' - ' . $this->llamado->año;
    }
}
