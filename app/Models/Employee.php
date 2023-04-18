<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Employee
 * @package App\Models
 * @version July 11, 2021, 4:59 am UTC
 *
 * @property \App\Models\Department $department
 * @property \Illuminate\Database\Eloquent\Collection $educationEmployees
 * @property string $rfid
 * @property string $first_name
 * @property string $last_name
 * @property string $nationality
 * @property string $voter_id
 * @property string $email
 * @property string $phone
 * @property string $religion
 * @property string $gender
 * @property string $dob
 * @property string $present_address
 * @property string $permanent_address
 * @property string $father_name
 * @property string $father_phone
 * @property string $mother_name
 * @property string $mother_phone
 * @property integer $designation_id
 * @property string $image
 * @property string $documents
 * @property integer $status
 * @property string $joining_date
 */
class Employee extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rfid',
        'first_name',
        'last_name',
        'nationality',
        'voter_id',
        'email',
        'phone',
        'religion',
        'gender',
        'dob',
        'present_address',
        'permanent_address',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'designation_id',
        'tax_category',
        'status',
        'joining_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rfid' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'nationality' => 'string',
        'voter_id' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'religion' => 'string',
        'gender' => 'string',
        'dob' => 'date',
        'present_address' => 'string',
        'permanent_address' => 'string',
        'father_name' => 'string',
        'father_phone' => 'string',
        'mother_name' => 'string',
        'mother_phone' => 'string',
        'designation_id' => 'integer',

        'image' => 'string',
        'documents' => 'string',
        'status' => 'integer',
        'joining_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function designation()
    {
        return $this->belongsTo(\App\Models\Designation::class, 'designation_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function educations()
    {
        return $this->belongsToMany(\App\Models\EducationEmployee::class, 'employee_id');
    }

    public function tax()
    {
        return $this->belongsTo(\App\Models\tax::class, 'tax_category');
    }
}
