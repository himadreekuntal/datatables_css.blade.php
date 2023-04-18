<?php

namespace Database\Factories;

use App\Models\MonthlySalary;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonthlySalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MonthlySalary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'salary_id' => $this->faker->word,
        'employee_id' => $this->faker->word,
        'advance_payment' => $this->faker->word,
        'payable_salary' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
