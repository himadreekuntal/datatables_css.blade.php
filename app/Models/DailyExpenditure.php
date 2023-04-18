<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DailyExpenditure
 * @package App\Models
 * @version July 14, 2021, 5:34 am UTC
 *
 * @property \App\Models\ExpenditureList $expenditure
 * @property integer $expenditure_id
 * @property string $amount
 * @property string $date
 * @property string $reference
 */
class DailyExpenditure extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'daily_expenditures';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'expenditure_id',
        'amount',
        'date',
        'reference'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'expenditure_id' => 'integer',
        'amount' => 'string',
        'date' => 'date',
        'reference' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expenditure_id' => 'required',
        'amount' => 'required|string|max:255',
        'date' => 'required',
        'reference' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function expenditure()
    {
        return $this->belongsTo(\App\Models\ExpenditureList::class, 'expenditure_id');
    }
}
