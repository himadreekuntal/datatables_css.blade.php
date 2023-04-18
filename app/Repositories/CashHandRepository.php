<?php

namespace App\Repositories;

use App\Models\CashHand;
use App\Repositories\BaseRepository;

/**
 * Class CashHandRepository
 * @package App\Repositories
 * @version January 24, 2023, 9:56 am UTC
*/

class CashHandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'amount'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CashHand::class;
    }
}
