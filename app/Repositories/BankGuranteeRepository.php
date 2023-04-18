<?php

namespace App\Repositories;

use App\Models\BankGurantee;
use App\Repositories\BaseRepository;

/**
 * Class BankGuranteeRepository
 * @package App\Repositories
 * @version December 19, 2021, 5:49 am UTC
*/

class BankGuranteeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tender_id',
        'bg_date',
        'bg_no',
        'bg_amount',
        'bank_info',
        'validity',
        'status'
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
        return BankGurantee::class;
    }
}
