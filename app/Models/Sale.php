<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sale
 * @package App\Models
 * @version December 24, 2020, 7:17 am UTC
 *
 * @property \App\Models\Customer $customer
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property integer $sales_id
 * @property string $sales_date
 * @property integer $customer_id
 * @property string $sub_total
 * @property string $vat
 * @property string $total_amount
 * @property string $paid
 * @property string $due
 * @property string $payment_type
 * @property string $payment_status
 * @property boolean $order_status
 * @property integer $bill_id
 */
class Sale extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sales';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [

        'sales_date',
        'customer_id',
        'sub_total',
        'vat',
        'vat_amount',
        'total_amount',
        'paid',
        'due',
        'order_status',
        'bill_id',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',

        'sales_date' => 'string',
        'customer_id' => 'integer',
        'sub_total' => 'string',
        'vat' => 'string',
        'vat_amount'=>'string',
        'total_amount' => 'string',
        'paid' => 'string',
        'due' => 'string',


    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'sales_date' => 'required',
        'customer_id' => 'required',
        'sub_total' => 'required|string|max:255',
        'vat' => 'required|string|max:255',
        'vat_amount' => 'required|string|max:255',
        'total_amount' => 'required|string|max:255',
        'paid' => 'required|string|max:255',
        'due' => 'required|string|max:255',

        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity','serial','rate','discount','total']);
    }
}
