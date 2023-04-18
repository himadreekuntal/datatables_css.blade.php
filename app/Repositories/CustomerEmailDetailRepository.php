<?php

namespace App\Repositories;

use App\Models\CustomerEmailDetail;
use App\Repositories\BaseRepository;

/**
 * Class CustomerEmailDetailRepository
 * @package App\Repositories
 * @version January 17, 2022, 5:54 am UTC
*/

class CustomerEmailDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email_id',
        'customer_name',
        'customer_company',
        'customer_email',
        'customer_phone'
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
        return CustomerEmailDetail::class;
    }
}
