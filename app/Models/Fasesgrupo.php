<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fasesgrupo
 * @package App\Models
 * @version June 14, 2018, 8:33 pm UTC
 *
 * @property string grupo
 * @property string fecha
 * @property string hora
 * @property integer estado
 * @property integer equipocasa_id
 * @property integer equipofuera_id
 * @property integer golcasa
 * @property integer golfuera
 */
class Fasesgrupo extends Model
{
    use SoftDeletes;

    public $table = 'fasesgrupos';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'grupo',
        'fecha',
        'hora',
        'estado',
        'equipocasa_id',
        'equipofuera_id',
        'golcasa',
        'golfuera'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'grupo' => 'string',
        'fecha' => 'string',
        'hora' => 'string',
        'estado' => 'integer',
        'equipocasa_id' => 'integer',
        'equipofuera_id' => 'integer',
        'golcasa' => 'integer',
        'golfuera' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    function equipocasa(){
        return $this->belongsTo('App\Models\equipos', 'equipocasa_id', 'id');
    }

    function equipofuera(){
        return $this->belongsTo('App\Models\equipos', 'equipofuera_id', 'id');
    }

    public function apuestas()
    {
        return $this->hasMany('App\Models\apuesta');
    }
}
