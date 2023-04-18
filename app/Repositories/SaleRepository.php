<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\BaseRepository;

/**
 * Class SaleRepository
 * @package App\Repositories
 * @version December 24, 2020, 7:17 am UTC
*/

class SaleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sales_id',
        'sales_date',
        'customer_id',
        'sub_total',
        'vat',
        'vat_amount',
        'total_amount',
        'paid',
        'due',
        'payment_type',
        'payment_status',
        'order_status',
        'bill_id',
        'po',
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
        return Sale::class;
    }
}
