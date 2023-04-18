<?php

namespace App\Repositories;

use App\Models\Tax;
use App\Repositories\BaseRepository;

/**
 * Class TaxRepository
 * @package App\Repositories
 * @version January 4, 2023, 6:48 am UTC
*/

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'criteria',
        'age_limit'
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
        return Tax::class;
    }
}
