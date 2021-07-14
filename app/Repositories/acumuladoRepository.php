<?php

namespace App\Repositories;

use App\Models\acumulado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class acumuladoRepository
 * @package App\Repositories
 * @version June 18, 2018, 1:19 am UTC
 *
 * @method acumulado findWithoutFail($id, $columns = ['*'])
 * @method acumulado find($id, $columns = ['*'])
 * @method acumulado first($columns = ['*'])
*/
class acumuladoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'monto',
        'fecha'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return acumulado::class;
    }
}
