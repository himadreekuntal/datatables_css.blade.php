<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ExpenditureList
 * @package App\Models
 * @version July 14, 2021, 5:31 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $dailyExpenditures
 * @property string $expenditure
 */
class ExpenditureList extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'expenditure_lists';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'expenditure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'expenditure' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expenditure' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dailyExpenditures()
    {
        return $this->hasMany(\App\Models\DailyExpenditure::class, 'expenditure_id');
    }
}
