<?php

namespace App\Repositories;

use App\Models\CustomerEmail;
use App\Repositories\BaseRepository;

/**
 * Class CustomerEmailRepository
 * @package App\Repositories
 * @version January 17, 2022, 5:54 am UTC
*/

class CustomerEmailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category'
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
        return CustomerEmail::class;
    }
}
