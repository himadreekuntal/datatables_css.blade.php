<?php

namespace App\Repositories;

use App\Models\EmployeeSalary;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeSalaryRepository
 * @package App\Repositories
 * @version January 4, 2023, 7:52 am UTC
*/

class EmployeeSalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'emp_id',
        'home_allowance',
        'car_allowance',
        'medical_allowance',
        'education_allowance',
        'base_salary',
        'pf',
        'tax',
        'total_salary'
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
        return EmployeeSalary::class;
    }
}
