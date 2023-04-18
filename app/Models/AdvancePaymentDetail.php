<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdvancePaymentDetail
 * @package App\Models
 * @version January 9, 2023, 5:45 am UTC
 *
 * @property \App\Models\AdvancePayment $advance
 * @property integer $advance_id
 * @property string $paid_amount
 * @property string $remaining_amount
 * @property string $payment_date
 */
class AdvancePaymentDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'advance_payment_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'advance_id',
        'paid_amount',
        'remaining_amount',
        'payment_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'advance_id' => 'integer',
        'paid_amount' => 'string',
        'remaining_amount' => 'string',
        'payment_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'advance_id' => 'required',
        'paid_amount' => 'required|string|max:255',
        'remaining_amount' => 'required|string|max:255',
        'payment_date' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function advance()
    {
        return $this->belongsTo(\App\Models\AdvancePayment::class, 'advance_id');
    }
}
