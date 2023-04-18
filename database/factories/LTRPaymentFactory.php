<?php

namespace Database\Factories;

use App\Models\LTRPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class LTRPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LTRPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lc_id' => $this->faker->word,
        'payment_date' => $this->faker->word,
        'payment_amount' => $this->faker->word,
        'payment_remaining' => $this->faker->word,
        'bank_statement_ap' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
