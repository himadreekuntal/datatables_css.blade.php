<?php

namespace App\Repositories;

use App\Models\ProductDescription;
use App\Repositories\BaseRepository;

/**
 * Class ProductDescriptionRepository
 * @package App\Repositories
 * @version December 23, 2021, 6:30 am UTC
*/

class ProductDescriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'product_name',
        'description',
        'product_image',
        'product_catalog',

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
        return ProductDescription::class;
    }
}
