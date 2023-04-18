<?php

namespace Database\Factories;

use App\Models\AdvancePaymentDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvancePaymentDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvancePaymentDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'advance_id' => $this->faker->word,
        'paid_amount' => $this->faker->word,
        'remaining_amount' => $this->faker->word,
        'payment_date' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
