<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LCDetail
 * @package App\Models
 * @version June 27, 2021, 5:05 am UTC
 *
 * @property \App\Models\Brand $brand
 * @property \Illuminate\Database\Eloquent\Collection $ltrPayments
 * @property string $date
 * @property integer $brand_id
 * @property string $commodities
 * @property string $payment_type
 * @property string $amount
 * @property string $margin
 * @property string $ltr_amount
 * @property string $invoice
 * @property string $lc_document
 * @property string $boe
 * @property string $bank_statement
 */
class LCDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'lc_details';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'date',
        'brand_id',
        'commodities',
        'payment_type',
        'amount',
        'margin',
        'margin_percentage',
        'ltr_amount'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'string',
        'brand_id' => 'integer',
        'commodities' => 'string',
        'payment_type' => 'string',
        'amount' => 'string',
        'margin' => 'string',
        'margin_percentage' =>'string',
        'ltr_amount' => 'string',
        'invoice' => 'string',
        'lc_document' => 'string',
        'boe' => 'string',
        'bank_statement' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required|string|max:255',
        'brand_id' => 'required',
        'commodities' => 'required|string|max:255',
        'payment_type' => 'required|string|max:255',
        'amount' => 'required|string|max:255',
        'margin' => 'required|string|max:255',
        'margin_percentage' => 'required|string|max:255',
        'ltr_amount' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class, 'brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function ltrPayments()
    {
        return $this->hasMany(\App\Models\LtrPayment::class, 'lc_id');
    }
}
