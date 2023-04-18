<?php

namespace Database\Factories;

use App\Models\LCDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class LCDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LCDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->word,
        'brand_id' => $this->faker->word,
        'commodities' => $this->faker->word,
        'payment_type' => $this->faker->word,
        'amount' => $this->faker->word,
        'margin' => $this->faker->word,
        'ltr_amount' => $this->faker->word,
        'invoice' => $this->faker->word,
        'lc_document' => $this->faker->word,
        'boe' => $this->faker->word,
        'bank_statement' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
