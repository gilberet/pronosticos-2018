<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class apuesta
 * @package App\Models
 * @version June 16, 2018, 6:46 pm UTC
 *
 * @property integer equipocasa_id
 * @property integer golcasa
 * @property integer equipofuera_id
 * @property integer golfuera
 * @property integer estado
 * @property integer user_id
 */
class apuesta extends Model
{
    use SoftDeletes;

    public $table = 'apuestas';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fasegrupo_id',
        'golcasa',
        'golfuera',
        'estado',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fasegrupo_id' => 'integer',
        'golcasa' => 'integer',
        'golfuera' => 'integer',
        'estado' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function fasesgrupos()
    {
        return $this->belongsTo('App\Models\Fasesgrupo', 'fasegrupo_id', 'id');
    }

    function usuario(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
