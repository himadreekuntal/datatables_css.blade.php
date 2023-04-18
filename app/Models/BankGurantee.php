<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BankGurantee
 * @package App\Models
 * @version December 19, 2021, 5:49 am UTC
 *
 * @property \App\Models\Tender $tender
 * @property integer $tender_id
 * @property string $bg_date
 * @property string $bg_no
 * @property string $bg_amount
 * @property string $bank_info
 * @property string $validity
 * @property string $status
 */
class BankGurantee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bank_gurantees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tender_id',
        'bg_date',
        'bg_no',
        'bg_amount',
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
