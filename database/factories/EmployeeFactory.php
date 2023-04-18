<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rfid' => $this->faker->word,
        'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'nationality' => $this->faker->word,
        'voter_id' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'religion' => $this->faker->word,
        'gender' => $this->faker->word,
        'dob' => $this->faker->word,
        'present_address' => $this->faker->text,
        'permanent_address' => $this->faker->text,
        'father_name' => $this->faker->word,
        'father_phone' => $this->faker->word,
        'mother_name' => $this->faker->word,
        'mother_phone' => $this->faker->word,
        'department_id' => $this->faker->word,
        'designation' => $this->faker->word,
        'image' => $this->faker->word,
        'documents' => $this->faker->word,
        'status' => $this->faker->randomDigitNotNull,
        'joining_date' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
