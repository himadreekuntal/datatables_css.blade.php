<?php

namespace App\Repositories;

use App\Models\DailyExpenditure;
use App\Repositories\BaseRepository;

/**
 * Class DailyExpenditureRepository
 * @package App\Repositories
 * @version July 14, 2021, 5:34 am UTC
*/

class DailyExpenditureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'expenditure_id',
        'amount',
        'date',
        'reference'
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
        return DailyExpenditure::class;
    }
}
