<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TaxDetail
 * @package App\Models
 * @version January 4, 2023, 6:49 am UTC
 *
 * @property \App\Models\Tax $tax
 * @property integer $tax_id
 * @property string $name
 * @property string $amount
 * @property string $tax_percentage
 */
class TaxDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tax_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'tax_id',
        'name',
        'amount',
        'tax_percentage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tax_id' => 'integer',
        'name' => 'string',
        'amount' => 'string',
        'tax_percentage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tax_id' => 'required',
        'name' => 'required|string|max:255',
        'amount' => 'required|string|max:255',
        'tax_percentage' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tax()
    {
        return $this->belongsTo(\App\Models\Tax::class, 'tax_id');
    }
}
