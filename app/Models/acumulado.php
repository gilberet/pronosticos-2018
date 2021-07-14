<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class acumulado
 * @package App\Models
 * @version June 18, 2018, 1:19 am UTC
 *
 * @property decimal monto
 * @property string fecha
 */
class acumulado extends Model
{
    use SoftDeletes;

    public $table = 'acumulados';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'monto',
        'fecha'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'monto' => 'required',
        'fecha' => 'required'
    ];


}
