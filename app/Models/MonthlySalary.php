<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MonthlySalary
 * @package App\Models
 * @version January 9, 2023, 10:59 am UTC
 *
 * @property \App\Models\Employee $employee
 * @property \App\Models\EmployeeSalary $salary
 * @property integer $salary_id
 * @property integer $employee_id
 * @property string $advance_payment
 * @property string $payable_salary
 */
class MonthlySalary extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'monthly_salaries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'salary_id',
        'employee_id',
        'advance_payment',
        'payable_salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'salary_id' => 'integer',
        'employee_id' => 'integer',
        'advance_payment' => 'string',
        'payable_salary' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'salary_id' => 'required',
        'employee_id' => 'required',
        'advance_payment' => 'required|string|max:255',
        'payable_salary' => 'required|string|max:255',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function salary()
    {
        return $this->belongsTo(\App\Models\EmployeeSalary::class, 'salary_id');
    }
}
