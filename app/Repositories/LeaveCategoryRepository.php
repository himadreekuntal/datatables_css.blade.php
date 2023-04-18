<?php

namespace App\Repositories;

use App\Models\LeaveCategory;
use App\Repositories\BaseRepository;

/**
 * Class LeaveCategoryRepository
 * @package App\Repositories
 * @version December 29, 2022, 4:54 am UTC
*/

class LeaveCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'leave_name',
        'max_leave'
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
        return LeaveCategory::class;
    }
}
