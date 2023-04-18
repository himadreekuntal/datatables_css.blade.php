<?php

namespace Database\Factories;

use App\Models\PerformanceGurantee;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerformanceGuranteeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerformanceGurantee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tender_id' => $this->faker->word,
        'pg_date' => $this->faker->word,
        'pg_no' => $this->faker->word,
        'pg_amount' => $this->faker->word,
        'bank_info' => $this->faker->word,
        'validity' => $this->faker->word,
        'status' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
