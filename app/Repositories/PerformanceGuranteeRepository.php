<?php

namespace App\Repositories;

use App\Models\PerformanceGurantee;
use App\Repositories\BaseRepository;

/**
 * Class PerformanceGuranteeRepository
 * @package App\Repositories
 * @version December 19, 2021, 5:49 am UTC
*/

class PerformanceGuranteeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tender_id',
        'pg_date',
        'pg_no',
        'pg_amount',
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
        return PerformanceGurantee::class;
    }
}
