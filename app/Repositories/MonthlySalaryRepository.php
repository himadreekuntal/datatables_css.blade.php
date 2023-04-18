<?php

namespace App\Repositories;

use App\Models\MonthlySalary;
use App\Repositories\BaseRepository;

/**
 * Class MonthlySalaryRepository
 * @package App\Repositories
 * @version January 9, 2023, 10:59 am UTC
*/

class MonthlySalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'salary_id',
        'employee_id',
        'advance_payment',
        'payable_salary'
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
        return MonthlySalary::class;
    }
}
