<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Brand
 * @package App\Models
 * @version December 22, 2020, 7:06 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $brand
 * @property string $origin
 * @property integer $status
 */
class Brand extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'brands';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'brand',
        'origin',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'brand' => 'string',
        'origin' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'brand' => 'required|string|max:255',
        'origin' => 'required|string|max:255',
        'status' => 'required|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'brand_id');
    }
}
