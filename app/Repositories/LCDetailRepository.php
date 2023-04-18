<?php

namespace App\Repositories;

use App\Models\LCDetail;
use App\Repositories\BaseRepository;

/**
 * Class LCDetailRepository
 * @package App\Repositories
 * @version June 27, 2021, 5:05 am UTC
*/

class LCDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'brand_id',
        'commodities',
        'payment_type',
        'amount',
        'margin',
        'margin_percentage',
        'ltr_amount',
        'invoice',
        'lc_document',
        'boe',
        'bank_statement'
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
        return LCDetail::class;
    }
}
