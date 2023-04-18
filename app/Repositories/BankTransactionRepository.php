<?php

namespace App\Repositories;

use App\Models\BankTransaction;
use App\Repositories\BaseRepository;

/**
 * Class BankTransactionRepository
 * @package App\Repositories
 * @version January 24, 2023, 9:56 am UTC
*/

class BankTransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'amount',
        'reference'
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
        return BankTransaction::class;
    }
}
