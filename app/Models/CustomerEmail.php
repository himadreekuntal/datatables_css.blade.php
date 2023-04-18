<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomerEmail
 * @package App\Models
 * @version January 17, 2022, 5:54 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $customerEmailDetails
 * @property string $category
 */
class CustomerEmail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer_emails';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customerEmailDetails()
    {
        return $this->hasMany(\App\Models\CustomerEmailDetail::class, 'email_id');
    }
}
