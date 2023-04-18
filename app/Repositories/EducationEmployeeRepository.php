<?php

namespace App\Repositories;

use App\Models\EducationEmployee;
use App\Repositories\BaseRepository;

/**
 * Class EducationEmployeeRepository
 * @package App\Repositories
 * @version November 11, 2021, 6:48 am UTC
*/

class EducationEmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'exam_name',
        'division',
        'institute',
        'passing_year',
        'cgpa'
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
        return EducationEmployee::class;
    }
}
