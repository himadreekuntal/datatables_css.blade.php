<?php

namespace App\Repositories;

use App\Models\Tender;
use App\Repositories\BaseRepository;

/**
 * Class TenderRepository
 * @package App\Repositories
 * @version December 19, 2021, 5:48 am UTC
*/

class TenderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etender_id',
        'procuring_entity',
        'item',
        'tender_status',
        'bg_status',
        'pg_status',
        'opening_date'
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
        return Tender::class;
    }
}
