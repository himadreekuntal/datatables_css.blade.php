<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LTRPayment
 * @package App\Models
 * @version June 27, 2021, 5:06 am UTC
 *
 * @property \App\Models\LcDetail $lc
 * @property integer $lc_id
 * @property string $payment_date
 * @property string $payment_amount
 * @property string $payment_remaining
 * @property string $bank_statement_ap
 */
class LTRPayment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ltr_payments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'lc_id',
        'payment_date',
        'payment_amount',
        'payment_remaining'       
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lc_id' => 'integer',
        'payment_date' => 'string',
        'payment_amount' => 'string',
        'payment_remaining' => 'string',
        'bank_statement_ap' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lc_id' => 'required',
        'payment_date' => 'required|string|max:255',
        'payment_amount' => 'required|string|max:255',
        'payment_remaining' => 'required|string|max:255',
        
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lc()
    {
        return $this->belongsTo(\App\Models\LcDetail::class, 'lc_id');
    }
}
