<?php

namespace App\Repositories;

use App\Models\equipos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class equiposRepository
 * @package App\Repositories
 * @version June 14, 2018, 4:52 pm UTC
 *
 * @method equipos findWithoutFail($id, $columns = ['*'])
 * @method equipos find($id, $columns = ['*'])
 * @method equipos first($columns = ['*'])
*/
class equiposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return equipos::class;
    }
}
