<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * @package App\Models
 * @version December 22, 2020, 7:07 am UTC
 *
 * @property \App\Models\Brand $brand
 * @property \App\Models\Category $category
 * @property string $product
 * @property integer $category_id
 * @property integer $brand_id
 * @property string $image
 * @property string $catalog
 * @property string $qty
 * @property string $warranty
 * @property string $buying_price
 * @property string $selling_price
 * @property boolean $status
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'product',
        'category_id',
        'brand_id',       
        'qty',
        'warranty',
        'buying_price',
        'selling_price',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product' => 'string',
        'category_id' => 'integer',
        'brand_id' => 'integer',       
        'qty' => 'string',
        'warranty' => 'string',
        'buying_price' => 'string',
        'selling_price' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product' => 'required|string|max:255',
        'category_id' => 'required',
        'brand_id' => 'required',
        'qty' => 'required|string|max:255',
        'warranty' => 'required|string|max:255',
        'buying_price' => 'required|string|max:255',
        'selling_price' => 'required|string|max:255',
        'status' => 'required|boolean',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
