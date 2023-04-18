<?php

namespace Database\Factories;

use App\Models\DailyExpenditure;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailyExpenditureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DailyExpenditure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expenditure_id' => $this->faker->word,
        'amount' => $this->faker->word,
        'date' => $this->faker->word,
        'reference' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
