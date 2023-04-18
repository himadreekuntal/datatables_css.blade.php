<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EducationEmployee
 * @package App\Models
 * @version November 11, 2021, 6:48 am UTC
 *
 * @property \App\Models\Employee $employee
 * @property integer $employee_id
 * @property string $exam_name
 * @property string $division
 * @property string $institute
 * @property string $passing_year
 * @property string $cgpa
 */
class EducationEmployee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'education_employee';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'exam_name',
        'division',
        'institute',
        'passing_year',
        'cgpa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'employee_id' => 'integer',
        'exam_name' => 'string',
        'division' => 'string',
        'institute' => 'string',
        'passing_year' => 'string',
        'cgpa' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required',
        'exam_name' => 'required|string|max:255',
        'division' => 'required|string|max:255',
        'institute' => 'required|string|max:255',
        'passing_year' => 'required|string|max:255',
        'cgpa' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id');
    }
}
