<?php

namespace Database\Factories;

use App\Models\EmployeeSalary;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeSalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeSalary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_id' => $this->faker->word,
        'home_allowance' => $this->faker->word,
        'car_allowance' => $this->faker->word,
        'medical_allowance' => $this->faker->word,
        'education_allowance' => $this->faker->word,
        'base_salary' => $this->faker->word,
        'pf' => $this->faker->word,
        'total_salary' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
