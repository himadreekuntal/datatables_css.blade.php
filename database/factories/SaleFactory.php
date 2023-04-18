<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sales_id' => $this->faker->word,
        'sales_date' => $this->faker->word,
        'customer_id' => $this->faker->word,
        'sub_total' => $this->faker->word,
        'vat' => $this->faker->word,
        'total_amount' => $this->faker->word,
        'paid' => $this->faker->word,
        'due' => $this->faker->word,
        'payment_type' => $this->faker->randomDigitNotNull,
        'payment_status' => $this->faker->randomDigitNotNull,
        'order_status' => $this->faker->word,
        'bill_id' => $this->faker->randomDigitNotNull,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
