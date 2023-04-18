<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Designation
 * @package App\Models
 * @version October 27, 2021, 6:47 am UTC
 *
 * @property string $designation
 * @property string $base_salary
 * @property string $home_incentive
 * @property string $medical_incentive
 * @property string $car_incentive
 * @property string $education_incentive
 * @property integer $status
 */
class Designation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'designations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'designation',
        'base_salary',
        'dept_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'designation' => 'string',
        'dept_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
     /*   'designation' => 'required|string|max:255',
        'base_salary' => 'required|string|max:255',
        'home_incentive' => 'required|string|max:255',
        'medical_incentive' => 'required|string|max:255',
        'car_incentive' => 'required|string|max:255',
        'education_incentive' => 'required|string|max:255',
        'status' => 'required|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'*/
    ];
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'dept_id');
    }

}
