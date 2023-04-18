<?php

namespace App\Repositories;

use App\Models\Quotation;
use App\Repositories\BaseRepository;

/**
 * Class QuotationRepository
 * @package App\Repositories
 * @version December 28, 2020, 7:18 am UTC
*/

class QuotationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'qut_date',
        'customer_id',
        'sub_total',
        'tax',
        'tax_amount',
        'ait',
        'ait_amount',
        'total_amount',
        'delivery_time',
        'payment',

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
        return Quotation::class;
    }
}
