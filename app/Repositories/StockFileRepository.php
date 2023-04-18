<?php

namespace App\Repositories;

use App\Models\StockFile;
use App\Repositories\BaseRepository;

/**
 * Class StockFileRepository
 * @package App\Repositories
 * @version January 4, 2021, 5:14 am UTC
*/

class StockFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'file'
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
        return StockFile::class;
    }
}
