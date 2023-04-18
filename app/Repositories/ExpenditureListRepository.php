<?php

namespace App\Repositories;

use App\Models\ExpenditureList;
use App\Repositories\BaseRepository;

/**
 * Class ExpenditureListRepository
 * @package App\Repositories
 * @version July 14, 2021, 5:31 am UTC
*/

class ExpenditureListRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'expenditure'
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
        return ExpenditureList::class;
    }
}
