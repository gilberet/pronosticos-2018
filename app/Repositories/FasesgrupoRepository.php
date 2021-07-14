<?php

namespace App\Repositories;

use App\Models\Fasesgrupo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FasesgrupoRepository
 * @package App\Repositories
 * @version June 14, 2018, 8:33 pm UTC
 *
 * @method Fasesgrupo findWithoutFail($id, $columns = ['*'])
 * @method Fasesgrupo find($id, $columns = ['*'])
 * @method Fasesgrupo first($columns = ['*'])
*/
class FasesgrupoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Fasesgrupo::class;
    }
}
