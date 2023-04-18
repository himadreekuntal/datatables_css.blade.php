<?php

namespace Database\Factories;

use App\Models\AdvancePayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvancePaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvancePayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->word,
        'advance_payment' => $this->faker->word,
        'monthly_payment' => $this->faker->word,
        'interest' => $this->faker->word,
        'repayment_time' => $this->faker->word,
        'loan_reason' => $this->faker->text,
        'status' => $this->faker->word,
        'approve' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
