<?php

namespace Database\Factories;

use App\Models\EducationEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->word,
        'exam_name' => $this->faker->word,
        'division' => $this->faker->word,
        'institute' => $this->faker->word,
        'passing_year' => $this->faker->word,
        'cgpa' => $this->faker->word
        ];
    }
}
