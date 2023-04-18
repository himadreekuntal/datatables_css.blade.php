<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeLeave
 * @package App\Models
 * @version December 26, 2022, 7:34 am UTC
 *
 * @property \App\Models\Employee $employee
 * @property integer $employee_id
 * @property string $description
 * @property string $from
 * @property string $to
 * @property integer $status
 * @property string $documents
 */
class EmployeeLeave extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employee_leaves';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'description',
        'from',
        'to',
        'status',
        'documents'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'description' => 'string',
        'from' => 'date',
        'to' => 'date',
        'status' => 'integer',
        'documents' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required',
        'description' => 'required|string',
        'from' => 'required',
        'to' => 'required',
        'status' => 'required|integer',
        'documents' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }

    public function leave()
    {
        return $this->belongsTo(\App\Models\LeaveCategory::class, 'leave_id');
    }
}
