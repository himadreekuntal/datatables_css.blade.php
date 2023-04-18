<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\BaseRepository;

/**
 * Class BrandRepository
 * @package App\Repositories
 * @version December 22, 2020, 7:06 am UTC
*/

class BrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand',
        'origin',
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
        return Brand::class;
    }
}
