<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PerformanceGurantee
 * @package App\Models
 * @version December 19, 2021, 5:49 am UTC
 *
 * @property \App\Models\Tender $tender
 * @property integer $tender_id
 * @property string $pg_date
 * @property string $pg_no
 * @property string $pg_amount
 * @property string $bank_info
 * @property string $validity
 * @property string $status
 */
class PerformanceGurantee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'performance_gurantees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tender_id',
        'pg_date',
        'pg_no',
        'pg_amount',
        'bank_info',
        'validity',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tender()
    {
        return $this->belongsTo(\App\Models\Tender::class, 'tender_id');
    }
}
