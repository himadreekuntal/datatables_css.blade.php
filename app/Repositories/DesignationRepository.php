<?php

namespace App\Repositories;

use App\Models\Designation;
use App\Repositories\BaseRepository;

/**
 * Class DesignationRepository
 * @package App\Repositories
 * @version October 27, 2021, 6:47 am UTC
*/

class DesignationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'designation',
        'base_salary',
        'home_incentive',
        'medical_incentive',
        'car_incentive',
        'education_incentive',
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
        return Designation::class;
    }
}
