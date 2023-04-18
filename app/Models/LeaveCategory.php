<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LeaveCategory
 * @package App\Models
 * @version December 29, 2022, 4:54 am UTC
 *
 * @property string $leave_name
 * @property string $max_leave
 */
class LeaveCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'leave_categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'leave_name',
        'max_leave'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'leave_name' => 'string',
        'max_leave' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'leave_name' => 'required|string|max:255',
        'max_leave' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
