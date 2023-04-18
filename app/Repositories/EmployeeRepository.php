<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version July 11, 2021, 4:59 am UTC
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rfid',
        'first_name',
        'last_name',
        'nationality',
        'voter_id',
        'email',
        'phone',
        'religion',
        'gender',
        'dob',
        'present_address',
        'permanent_address',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'department_id',
        'designation',
        'image',
        'documents',
        'status',
        'joining_date'
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
        return Employee::class;
    }
}
