<?php

namespace App\Repositories;

use App\Models\TaxDetail;
use App\Repositories\BaseRepository;

/**
 * Class TaxDetailRepository
 * @package App\Repositories
 * @version January 4, 2023, 6:49 am UTC
*/

class TaxDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tax_id',
        'name',
        'amount',
        'tax_percentage'
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
        return TaxDetail::class;
    }
}
