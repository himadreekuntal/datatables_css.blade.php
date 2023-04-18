<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Quotation
 * @package App\Models
 * @version December 28, 2020, 7:18 am UTC
 *
 * @property \App\Models\Customer $customer
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $qut_date
 * @property integer $customer_id
 * @property string $sub_total
 * @property string $vat
 * @property string $ait
 * @property string $total_amount
 * @property string $delivery_time
 * @property string $payment
 * @property boolean $qut_status
 */
class Quotation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'quotations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'qut_date',
        'customer_id',
        'sub_total',
        'tax',
        'tax_amount',
        'ait',
        'ait_amount',
        'total_amount',
        'delivery_time',
        'payment',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'qut_date' => 'string',
        'customer_id' => 'integer',
        'sub_total' => 'string',
        'tax' => 'string',
        'tax_amount'=>'string',
        'ait' => 'string',
        'ait_amount' => 'string',
        'total_amount' => 'string',
        'delivery_time' => 'string',
        'payment' => 'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'qut_date' => 'required',
        'customer_id' => 'required',
        'sub_total' => 'required|string|max:255',
        'tax' => 'required|string|max:255',
        'tax_amount' => 'required|string|max:255',
        'total_amount' => 'required|string|max:255',
        'delivery_time' => 'required|string|max:255',
        'payment' => 'required|string|max:255',
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
        return $this->belongsToMany(Product::class)->withPivot(['quantity','rate','discount','total']);
    }
}
