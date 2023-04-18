<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Tender
 * @package App\Models
 * @version December 19, 2021, 5:48 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bankGurantees
 * @property \Illuminate\Database\Eloquent\Collection $performanceGurantees
 * @property string $etender_id
 * @property string $procuring_entity
 * @property string $item
 * @property string $tender_status
 * @property string $bg_status
 * @property string $pg_status
 * @property string $opening_date
 */
class Tender extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tenders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etender_id',
        'procuring_entity',
        'item',
        'tender_status',
        'bg_status',
        'pg_status',
        'opening_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etender_id' => 'string',
        'procuring_entity' => 'string',
        'item' => 'string',
        'tender_status' => 'string',
        'bg_status' => 'string',
        'pg_status' => 'string',
        'opening_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etender_id' => 'required|string|max:255',
        'procuring_entity' => 'required|string|max:255',
        'item' => 'required|string|max:255',
        'tender_status' => 'nullable',
        'bg_status' => 'nullable',
        'pg_status' => 'nullable',
        'opening_date' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bankGurantees()
    {
        return $this->hasMany(\App\Models\BankGurantee::class, 'tender_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function performanceGurantees()
    {
        return $this->hasMany(\App\Models\PerformanceGurantee::class, 'tender_id');
    }
}
