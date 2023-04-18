<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomerEmailDetail
 * @package App\Models
 * @version January 17, 2022, 5:54 am UTC
 *
 * @property \App\Models\CustomerEmail $email
 * @property integer $email_id
 * @property string $customer_name
 * @property string $customer_company
 * @property string $customer_email
 * @property string $customer_phone
 */
class CustomerEmailDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer_email_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'email_id',
        'customer_name',
        'customer_company',
        'customer_email',
        'customer_phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email_id' => 'integer',
        'customer_name' => 'string',
        'customer_company' => 'string',
        'customer_email' => 'string',
        'customer_phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email_id' => 'required',
        'customer_name' => 'required|string|max:255',
        'customer_company' => 'required|string|max:255',
        'customer_email' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function email()
    {
        return $this->belongsTo(\App\Models\CustomerEmail::class, 'email_id');
    }
}
