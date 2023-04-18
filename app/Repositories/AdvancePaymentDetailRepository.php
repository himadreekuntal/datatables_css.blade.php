<?php

namespace App\Repositories;

use App\Models\AdvancePaymentDetail;
use App\Repositories\BaseRepository;

/**
 * Class AdvancePaymentDetailRepository
 * @package App\Repositories
 * @version January 9, 2023, 5:45 am UTC
*/

class AdvancePaymentDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'advance_id',
        'paid_amount',
        'remaining_amount',
        'payment_date'
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
        return AdvancePaymentDetail::class;
    }
}
