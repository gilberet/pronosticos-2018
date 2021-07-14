<?php

namespace App\Repositories;

use App\Models\apuesta;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class apuestaRepository
 * @package App\Repositories
 * @version June 16, 2018, 6:46 pm UTC
 *
 * @method apuesta findWithoutFail($id, $columns = ['*'])
 * @method apuesta find($id, $columns = ['*'])
 * @method apuesta first($columns = ['*'])
*/
class apuestaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'equipocasa_id',
        'golcasa',
        'equipofuera_id',
        'golfuera',
        'estado',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return apuesta::class;
    }
}
