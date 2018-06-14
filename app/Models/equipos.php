<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class equipos
 * @package App\Models
 * @version June 14, 2018, 4:52 pm UTC
 *
 * @property string nombre
 * @property string imagen
 */
class equipos extends Model
{
    use SoftDeletes;

    public $table = 'equipos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'imagen',
        'codigo',
        'grupo_id',
        'grupo_letra',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'imagen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    
}
