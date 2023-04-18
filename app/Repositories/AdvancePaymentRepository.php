<?php

namespace App\Repositories;

use App\Models\AdvancePayment;
use App\Repositories\BaseRepository;

/**
 * Class AdvancePaymentRepository
 * @package App\Repositories
 * @version January 9, 2023, 5:45 am UTC
*/

class AdvancePaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'advance_payment',
        'monthly_payment',
        'interest',
        'repayment_time',
        'loan_reason',
        'status',
        'approve'
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
        return AdvancePayment::class;
    }
}
