<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeSalary
 * @package App\Models
 * @version January 4, 2023, 7:52 am UTC
 *
 * @property \App\Models\Employee $emp
 * @property integer $emp_id
 * @property string $home_allowance
 * @property string $car_allowance
 * @property string $medical_allowance
 * @property string $education_allowance
 * @property string $base_salary
 * @property string $pf
 * @property string $total_salary
 */
class EmployeeSalary extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employee_salaries';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'emp_id',
        'home_allowance',
        'car_allowance',
        'medical_allowance',
        'education_allowance',
        'base_salary',
        'pf',
        'tax',
        'total_salary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'emp_id' => 'integer',
        'home_allowance' => 'string',
        'car_allowance' => 'string',
        'medical_allowance' => 'string',
        'education_allowance' => 'string',
        'base_salary' => 'string',
        'pf' => 'string',
        'tax' => 'string',
        'total_salary' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'emp_id' => 'required',
        'home_allowance' => 'required|string|max:255',
        'car_allowance' => 'required|string|max:255',
        'medical_allowance' => 'required|string|max:255',
        'education_allowance' => 'required|string|max:255',
        'base_salary' => 'required|string|max:255',
        'pf' => 'required|string|max:255',
        'tax' => 'required|string|max:255',
        'total_salary' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function emp()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'emp_id');
    }
}
