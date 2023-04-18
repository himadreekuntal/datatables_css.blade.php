<?php

namespace App\Repositories;

use App\Models\LTRPayment;
use App\Repositories\BaseRepository;

/**
 * Class LTRPaymentRepository
 * @package App\Repositories
 * @version June 27, 2021, 5:06 am UTC
*/

class LTRPaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lc_id',
        'payment_date',
        'payment_amount',
        'payment_remaining',
        'bank_statement_ap'
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
        return LTRPayment::class;
    }
}
