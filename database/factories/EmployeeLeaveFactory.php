<?php

namespace Database\Factories;

use App\Models\EmployeeLeave;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeLeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeLeave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->word,
        'description' => $this->faker->text,
        'from' => $this->faker->word,
        'to' => $this->faker->word,
        'status' => $this->faker->randomDigitNotNull,
        'documents' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
