<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdvancePayment
 * @package App\Models
 * @version January 9, 2023, 5:45 am UTC
 *
 * @property \App\Models\Employee $employee
 * @property \Illuminate\Database\Eloquent\Collection $advancePaymentDetails
 * @property integer $employee_id
 * @property string $advance_payment
 * @property string $monthly_payment
 * @property string $interest
 * @property string $repayment_time
 * @property string $loan_reason
 * @property boolean $status
 * @property boolean $approve
 */
class AdvancePayment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'advance_payments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'advance_payment',
        'monthly_payment',
        'interest',
        'repayment_time',
        'loan_reason',
        'status',
        'approve'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'advance_payment' => 'string',
        'monthly_payment' => 'string',
        'interest' => 'string',
        'repayment_time' => 'string',
        'loan_reason' => 'string',
        'status' => 'boolean',
        'approve' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required',
        'advance_payment' => 'required|string|max:255',
        'monthly_payment' => 'required|string|max:255',
        'interest' => 'required|string|max:255',
        'repayment_time' => 'required|string|max:255',
        'loan_reason' => 'required|string',
        'status' => 'boolean',
        'approve' => 'required|boolean',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function advancePaymentDetails()
    {
        return $this->hasMany(\App\Models\AdvancePaymentDetail::class, 'advance_id');
    }
}
