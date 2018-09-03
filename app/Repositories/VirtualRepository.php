<?php

namespace App\Repositories;

use App\Models\Virtual;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VirtualRepository
 * @package App\Repositories
 * @version August 15, 2018, 2:17 pm UTC
 *
 * @method Virtual findWithoutFail($id, $columns = ['*'])
 * @method Virtual find($id, $columns = ['*'])
 * @method Virtual first($columns = ['*'])
*/
class VirtualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'trx_id',
        'trx_amount',
        'virtual_account',
        'description',
        'expired',
        'email',
        'name',
        'phone',
        'tipe',
        'jalur'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Virtual::class;
    }
}
