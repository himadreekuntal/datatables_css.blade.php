<?php

namespace App\Repositories;

use App\Models\EmployeeLeave;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeLeaveRepository
 * @package App\Repositories
 * @version December 26, 2022, 7:34 am UTC
*/

class EmployeeLeaveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'description',
        'from',
        'to',
        'status',
        'documents'
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
        return EmployeeLeave::class;
    }
}
